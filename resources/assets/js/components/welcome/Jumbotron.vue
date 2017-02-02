<template>

    <section id="intro" class="main-intro">
        <div id="particles" class="particle-bg">
            <canvas id="particle-canvas" class="particle-el"></canvas>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <div class="text-intro">
                        <h1>
                            VR-Pano!
                        </h1>

                        <p>
                            Easy-to-use, powerful and awesome.
                        </p>
                        <a href="#" class="btn more">
                            了解更多
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>
<style>
    .main-intro {
        background: #2c3e50;
        overflow: hidden;
        position: relative;
        padding: 100px 0;
        padding-top: 130px;
    }
    .particle-bg:before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(to bottom right,#002f4b,#dc4225);
        opacity: .3;
      }
    .particle-bg{
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        z-index: 0;
        background-image: url('./../../../imgs/background.jpg');
        overflow: hidden;
        background-size: cover;
        background-position: center center;

    }
    .particle-el{
        width: 100%;
        height: 100%;
    }
    .text-intro {
        padding-top: 120px;
        padding-bottom: 105px;
    }
    .text-intro > h1 {
        font-weight: 300;
        color: #FFF;
        line-height: 1.2em;
        font-size: 56px;
        letter-spacing: 2px;
        margin-top: 0;
        margin-bottom: 25px;
    }
    .text-intro > p {
        font-size: 22px;
        margin: 0;
        margin-bottom: 50px;
        color: #FFF;
        font-style: italic;
        letter-spacing: 2px;
    }
    a.more {
        text-decoration: none;
        border-color: #fff;
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        padding: 15.5px 45px;
        border-radius: 0;
        transition: all .3s ease-in-out;
    }
    a.more:focus, a.more:hover {
        padding: 15.5px 65px;
        font-weight: bold;
        background-color: #fff;
        color: #004a3c;
    }
</style>
<script>
    import TweenLite from 'gsap'
    export default{
        mounted () {
            let canvas = document.getElementsByClassName('particle-el')
            canvas[0].width = window.innerWidth;
            canvas[0].height = window.innerHeight;

            (function() {

                var width, height, largeHeader, canvas, ctx, points, target, animateHeader = true;

                // Main
                initHeader();
                initAnimation();
                addListeners();

                function initHeader() {
                    width = window.innerWidth;
                    height = window.innerHeight;
                    target = {x: width/2, y: height/2};

                    canvas = document.getElementById('particle-canvas');
                    canvas.width = width;
                    canvas.height = height;
                    ctx = canvas.getContext('2d');

                    // create points
                    points = [];
                    for(var x = 0; x < width; x = x + width/10) {
                        for(var y = 0; y < height; y = y + height/10) {
                            var px = x + Math.random()*width/20;
                            var py = y + Math.random()*height/20;
                            var p = {x: px, originX: px, y: py, originY: py };
                            points.push(p);
                        }
                    }

                    // for each point find the 5 closest points
                    for(var i = 0; i < points.length; i++) {
                        var closest = [];
                        var p1 = points[i];
                        for(var j = 0; j < points.length; j++) {
                            var p2 = points[j]
                            if(!(p1 == p2)) {
                                var placed = false;
                                for(var k = 0; k < 5; k++) {
                                    if(!placed) {
                                        if(closest[k] == undefined) {
                                            closest[k] = p2;
                                            placed = true;
                                        }
                                    }
                                }

                                for(var k = 0; k < 5; k++) {
                                    if(!placed) {
                                        if(getDistance(p1, p2) < getDistance(p1, closest[k])) {
                                            closest[k] = p2;
                                            placed = true;
                                        }
                                    }
                                }
                            }
                        }
                        p1.closest = closest;
                    }

                    // assign a circle to each point
                    for(var i in points) {
                        var c = new Circle(points[i], 2+Math.random()*2, 'rgba(255,255,255,0.3)');
                        points[i].circle = c;
                    }
            }

        // Event handling
        function addListeners() {
            if(!('ontouchstart' in window)) {
                window.addEventListener('mousemove', mouseMove);
            }
            window.addEventListener('scroll', scrollCheck);
            window.addEventListener('resize', resize);
        }

        function mouseMove(e) {
            var posx = 0;
            var posy = 0;
            if (e.pageX || e.pageY) {
                posx = e.pageX;
                posy = e.pageY;
            }
            else if (e.clientX || e.clientY)    {
                posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
                posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
            }
            target.x = posx;
            target.y = posy;
        }

        function scrollCheck() {
            if(document.body.scrollTop > height) animateHeader = false;
            else animateHeader = true;
        }

        function resize() {
            width = window.innerWidth;
            height = window.innerHeight;
            largeHeader.style.height = height+'px';
            canvas.width = width;
            canvas.height = height;
        }

        // animation
        function initAnimation() {
            animate();
            for(var i in points) {
                shiftPoint(points[i]);
            }
        }

        function animate() {
            if(animateHeader) {
                ctx.clearRect(0,0,width,height);
                for(var i in points) {
                    // detect points in range
                    if(Math.abs(getDistance(target, points[i])) < 4000) {
                        points[i].active = 0.3;
                        points[i].circle.active = 0.6;
                    } else if(Math.abs(getDistance(target, points[i])) < 20000) {
                        points[i].active = 0.1;
                        points[i].circle.active = 0.3;
                    } else if(Math.abs(getDistance(target, points[i])) < 40000) {
                        points[i].active = 0.02;
                        points[i].circle.active = 0.1;
                    } else {
                        points[i].active = 0;
                        points[i].circle.active = 0;
                    }

                    drawLines(points[i]);
                    points[i].circle.draw();
                }
            }
            requestAnimationFrame(animate);
        }

        function shiftPoint(p) {
            TweenLite.to(p, 1+1*Math.random(), {x:p.originX-50+Math.random()*100,
                y: p.originY-50+Math.random()*100, ease:Circ.easeInOut,
                onComplete: function() {
                    shiftPoint(p);
                }});
        }

        // Canvas manipulation
        function drawLines(p) {
            if(!p.active) return;
            for(var i in p.closest) {
                ctx.beginPath();
                ctx.moveTo(p.x, p.y);
                ctx.lineTo(p.closest[i].x, p.closest[i].y);
                ctx.strokeStyle = 'rgba(255,217,249,'+ p.active+')';
                ctx.stroke();
            }
        }

            function Circle(pos,rad,color) {
                var _this = this;

                // constructor
                (function() {
                    _this.pos = pos || null;
                    _this.radius = rad || null;
                    _this.color = color || null;
                })();

                this.draw = function() {
                    if(!_this.active) return;
                    ctx.beginPath();
                    ctx.arc(_this.pos.x, _this.pos.y, _this.radius, 0, 2 * Math.PI, false);
                    ctx.fillStyle = 'rgba(156,217,249,'+ _this.active+')';
                    ctx.fill();
                };
            }

            // Util
            function getDistance(p1, p2) {
                return Math.pow(p1.x - p2.x, 2) + Math.pow(p1.y - p2.y, 2);
            }

        })();
        }
    }
</script>
