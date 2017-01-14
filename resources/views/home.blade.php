<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script type="text/javascript">
        var Laravel = {
            // 设置 csrfToken
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    <style>
        * {
            margin: 0;
        }
        .loader {
            position: relative;
            width: 2.5em;
            height: 2.5em;
            transform: rotate(165deg);
        }
        .loader:before, .loader:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            display: block;
            width: 0.5em;
            height: 0.5em;
            border-radius: 0.25em;
            transform: translate(-50%, -50%);
        }
        .loader:before {
            animation: before 2s infinite;
        }
        .loader:after {
            animation: after 2s infinite;
        }

        @keyframes before {
            0% {
                width: 0.5em;
                box-shadow: 1em -0.5em rgba(225, 20, 98, 0.75), -1em 0.5em rgba(111, 202, 220, 0.75);
            }
            35% {
                width: 2.5em;
                box-shadow: 0 -0.5em rgba(225, 20, 98, 0.75), 0 0.5em rgba(111, 202, 220, 0.75);
            }
            70% {
                width: 0.5em;
                box-shadow: -1em -0.5em rgba(225, 20, 98, 0.75), 1em 0.5em rgba(111, 202, 220, 0.75);
            }
            100% {
                box-shadow: 1em -0.5em rgba(225, 20, 98, 0.75), -1em 0.5em rgba(111, 202, 220, 0.75);
            }
        }
        @keyframes after {
            0% {
                height: 0.5em;
                box-shadow: 0.5em 1em rgba(61, 184, 143, 0.75), -0.5em -1em rgba(233, 169, 32, 0.75);
            }
            35% {
                height: 2.5em;
                box-shadow: 0.5em 0 rgba(61, 184, 143, 0.75), -0.5em 0 rgba(233, 169, 32, 0.75);
            }
            70% {
                height: 0.5em;
                box-shadow: 0.5em -1em rgba(61, 184, 143, 0.75), -0.5em 1em rgba(233, 169, 32, 0.75);
            }
            100% {
                box-shadow: 0.5em 1em rgba(61, 184, 143, 0.75), -0.5em -1em rgba(233, 169, 32, 0.75);
            }
        }
        /**
         * Attempt to center the whole thing!
         */
        .loader {
            position: absolute;
            top: calc(50% - 1.25em);
            left: calc(50% - 1.25em);
        }
    </style>
</head>
<body>
    <div class="loader"></div>
    <div id="app">
        <app></app>
    </div>

    <script src="./js/app.js"></script>
    <script>
        $(document).ready(function () {
            $(".loader").css('display','none');
        })
        $(window).scroll(function() {
            var yheight=getScrollTop(); //滚动条距顶端的距离

            if ( yheight >= 200)
                document.body.className = 'scrolled'
            else
                document.body.className = ''

        })
        function getScrollTop() {
            var scrollPos;
            if (window.pageYOffset) {
                scrollPos = window.pageYOffset;
            }else if (document.compatMode && document.compatMode != 'BackCompat') {
                scrollPos = document.documentElement.scrollTop;
            }else if (document.body) {
                scrollPos = document.body.scrollTop;
            }
            return scrollPos;
        }

        
    </script>
</body>
</html>
