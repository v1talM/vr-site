<template>
    <!--<div id="pano">-->
        <!--<audio autoplay id="vr_bgm" :src="vr.pro_bgm">-->
        <!--</audio>-->
    <!--</div>-->
    <canvas id="canvas"></canvas>
</template>
<style>
    #pano {
        overflow: hidden;
        height: inherit;
    }
</style>
<script>
    import {mapActions} from 'vuex'
    window.THREE = require('./../three/build/three')
    import {Scene,
            PerspectiveCamera,
            WebGLRenderer,
            Mesh,
            Texture,
            MeshBasicMaterial,
            BoxGeometry,
            SphereGeometry,
            MultiMaterial,
            Vector3,
            degToRad} from 'three'
    export default{
        data(){
            return{
                vr_id: this.$route.params.id,
                vr: [],
                pano: null,
                url: ''
            }
        },
        created () {
            this.setLoadingRouteData()
            this.getVRById(this.vr_id).then( response => {
                this.vr = response.body.data
                this.pano = JSON.parse(this.vr.pro_photo)
                this.setVRInfo(response.body.data)
                this.initVR()
                var audio = document.getElementById('vr_bgm')
                audio.play()
            }).catch( error => {
                const content = {
                    header: 'Oops!',
                    body: error.body
                }
                this.setModalContent(content)
                this.setShowModal()
            })
        },
        methods: {
            ...mapActions([
                'getVRById',
                'getPanoById',
                'setLoadingRouteData',
                'unsetLoadingRouteData',
                'setModalContent',
                'setShowModal',
                'setVRInfo'
            ]),
            initVR () {
                var camera, scene, renderer;
                var texture_placeholder,
                isUserInteracting = false,
                onMouseDownMouseX = 0, onMouseDownMouseY = 0,
                onPointerDownPointerX = 0, onPointerDownPointerY = 0,
                onPointerDownLon = 0, onPointerDownLat = 0,
                lon = 90, onMouseDownLon = 0,
                lat = 0, onMouseDownLat = 0,
                phi = 0, theta = 0
                const vm = this;
                init(vm);
                animate();
                function init(vm) {
                    var container, mesh;
                    container = document.getElementById( 'pano' );
                    camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 1100 );
                    camera.target = new THREE.Vector3( 0, 0, 0 );
                    scene = new THREE.Scene();
                    var geometry = new THREE.SphereGeometry( 500, 60, 40 );
                    geometry.scale( - 1, 1, 1 );
                    var vr_photo = new Image()
                    vr_photo.onload = function () {
                        vm.unsetLoadingRouteData()
                    }
                    vr_photo.src = vm.vr.pro_photo
                    var material = new THREE.MeshBasicMaterial( {
                        map: new THREE.TextureLoader().load( vr_photo.src )
                    } );
                    mesh = new THREE.Mesh( geometry, material );
				    scene.add( mesh );
				    renderer = new THREE.WebGLRenderer();
                    renderer.setPixelRatio( window.devicePixelRatio );
                    renderer.setSize( window.innerWidth, window.innerHeight );
                    container.appendChild( renderer.domElement );


                    document.addEventListener( 'mousedown', onDocumentMouseDown, false );
                    document.addEventListener( 'mousemove', onDocumentMouseMove, false );
                    document.addEventListener( 'mouseup', onDocumentMouseUp, false );
                    document.addEventListener( 'wheel', onDocumentMouseWheel, false );
                    document.addEventListener( 'touchstart', onDocumentTouchStart, false );
				    document.addEventListener( 'touchmove', onDocumentTouchMove, false );

				    function onDocumentTouchStart( event ) {
                        if ( event.touches.length == 1 ) {
                            onPointerDownPointerX = event.touches[ 0 ].pageX;
                            onPointerDownPointerY = event.touches[ 0 ].pageY;
                            onPointerDownLon = lon;
                            onPointerDownLat = lat;
                        }
                    }
                    function onDocumentTouchMove( event ) {
                        if ( event.touches.length == 1 ) {
                            lon = ( onPointerDownPointerX - event.touches[0].pageX ) * 0.1 + onPointerDownLon;
                            lat = ( event.touches[0].pageY - onPointerDownPointerY ) * 0.1 + onPointerDownLat;
                        }
                    }
                    document.addEventListener( 'dragover', function ( event ) {
                        event.preventDefault();
                        event.dataTransfer.dropEffect = 'copy';
                    }, false );
                    document.addEventListener( 'dragenter', function ( event ) {
                        document.body.style.opacity = 0.5;
                    }, false );
                    document.addEventListener( 'dragleave', function ( event ) {
                        document.body.style.opacity = 1;
                    }, false );
                    document.addEventListener( 'drop', function ( event ) {
                        event.preventDefault();
                        var reader = new FileReader();
                        reader.addEventListener( 'load', function ( event ) {
                            material.map.image.src = event.target.result;
                            material.map.needsUpdate = true;
                        }, false );
                        reader.readAsDataURL( event.dataTransfer.files[ 0 ] );
                        document.body.style.opacity = 1;
                    }, false );

                    window.addEventListener( 'resize', onWindowResize, false );
                }
                function onWindowResize() {
                    camera.aspect = window.innerWidth / window.innerHeight;
                    camera.updateProjectionMatrix();
                    renderer.setSize( window.innerWidth, window.innerHeight );
                }

                function onDocumentMouseDown( event ) {
                    isUserInteracting = true;
                    onPointerDownPointerX = event.clientX;
                    onPointerDownPointerY = event.clientY;
                    onPointerDownLon = lon;
                    onPointerDownLat = lat;
                }
                function onDocumentMouseMove( event ) {
                    if ( isUserInteracting === true ) {
                        lon = ( onPointerDownPointerX - event.clientX ) * 0.1 + onPointerDownLon;
                        lat = ( event.clientY - onPointerDownPointerY ) * 0.1 + onPointerDownLat;
                    }
                }
                function onDocumentMouseUp( event ) {
                    isUserInteracting = false;
                }
                function onDocumentMouseWheel( event ) {
                    var dis = camera.fov + event.deltaY * 0.01
                    if(dis > 85 || dis < 60){
                        return ;
                    }else{
                        camera.fov += event.deltaY * 0.01;
                    }
                    camera.updateProjectionMatrix();
                }

                function animate() {
                    requestAnimationFrame( animate );
                    update();
                }

                function update() {
                    if ( isUserInteracting === false ) {
                        lon += 0.025;
                        lat += 0.0125;
                    }
                    lat = Math.max( - 85, Math.min( 85, lat ) );
                    phi = THREE.Math.degToRad( 90 - lat );
                    theta = THREE.Math.degToRad( lon );
                    camera.target.x = 100 * Math.sin( phi ) * Math.cos( theta );
                    camera.target.y = 100 * Math.cos( phi );
                    camera.target.z = 100 * Math.sin( phi ) * Math.sin( theta );
                    camera.lookAt( camera.target );
                    /*
                    // distortion
                    camera.position.copy( camera.target ).negate();
                    */
                    renderer.render( scene, camera );
                }
            }
        }
    }
</script>
