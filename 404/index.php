<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=1024, user-scalable=no">
        <title>404 not found</title>

        <style>

        body, html {
            margin: 0;
            padding: 0;
        }

        body {
            background: #fff;
        }

        a.fourohfour {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: none;
            text-decoration: none;
            z-index: 9999;
        }

        div.noscript_fourohfour {
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            height: 200px;
            margin: auto;
            line-height: 200px;
            font-size: 200px;
            text-align: center;
            text-decoration: none;
            -webkit-font-smoothing: antialiased;
        }

        div.noscript_fourohfour a {
            color: white;
            text-decoration: none;
        }

        #holder_measurement {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            pointer-events: none;
        }

        #three_canvas_holder {
/*             background-color: #09f; */
            background-image:url("https://matteovandelli.com/assets/404/404_bluetext_white.png");
            background-size: 1024px 1024px;
            background-position: center;
            background-repeat: no-repeat;

            position: fixed;
            top: -1024px;
            left: -1024px;
            right: -1024px;
            bottom: -1024px;
            z-index: -1;
            pointer-events: none;
        }

/*
        #three_canvas_holder.mix_blend {
            background-color: transparent;
            mix-blend-mode: screen;
        }
*/

        #three_canvas {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
/*             mix-blend-mode: screen; */
            margin: auto;
        }

        </style>
    </head>
    <body bgcolor="#09f">

        <div id="holder_measurement"></div>
        <div id="three_canvas_holder"></div>


        <script src="https://matteovandelli.com/_jsapps/backdrop/_libs/three.min.js"></script>
        <script src="https://matteovandelli.com/assets/404/OBJLoader.js"></script>
        <script src="https://matteovandelli.com/assets/404/main.js"></script>

    </body>
</html>
