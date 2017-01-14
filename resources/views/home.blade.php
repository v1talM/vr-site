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
       
    </style>
</head>
<body>
    <div id="app">
        <app></app>
    </div>

    <script src="./js/app.js"></script>
    <script>
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
