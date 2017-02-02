<template>
    <div class="portfolio-jumb">
        <div class="jumb-content">
            <h1 class="jumb-title">
                虚拟还是现实？都是美好的期盼
                <small>Virtual or real, Both are good looking forward to.</small>
            </h1>

            <a href="#" class="btn upload-portfolio"> 上传作品 </a>
        </div>
    </div>
</template>
<style>
    .portfolio-jumb {
        background-image: url('./../../../imgs/background.jpg');
        background-size: cover;
        background-position: center;
        padding: 100px 0 60px 0;
        margin-bottom: 30px;
        position: relative;
    }
    .portfolio-jumb .jumb-content {
        padding: 2em 60px;
        color: #fff;
        text-align: center;
        position: relative;
    }
    .jumb-title{
        margin-bottom: 1em;
        font-size: 30px;
        font-weight: normal;
        text-shadow: 1px 1px 10px #000;
    }
    .jumb-title small{
        margin-top: 1em;
        display: block;
        color: #fff;
    }
    .jumb-content .upload-portfolio {
        border-color: #fff;
        color: #fff;
        font-size: 14px;
        font-weight: bold;
        padding: 15.5px 45px;
        border-radius: 0;
        transition: all .3s ease;
    }
    .jumb-content .upload-portfolio:hover {
        padding: 15.5px 65px;
        font-weight: bold;
        background-color: #fff;
        color: #004a3c;
    }

</style>
<script>
    export default{


    }
</script>
