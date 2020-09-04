<!DOCTYPE html>
<html class="" lang="en">
<script type="text/javascript">
    var mobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\s ce|palm/i.test(navigator.userAgent.toLowerCase()))

    var parts = location.hostname.split('.');
    var subdomain = parts.shift();

    if(mobile){
        document.location="http://m.siteniz.com";
    } else if ( !mobile && subdomain == 'm' ){
        document.location="http://m.siteniz.com";
    }
</script>
<head>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <title>InfoStation</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Varela+Round'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <style>
        body {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;

            background: #9FAFD1;
            color: black;
            font-family: 'Varela Round', sans-serif;
            text-align: center;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .container {
            position: absolute;
            top: 50%;
            width: 100%;
            min-width: 320px;
            margin: -30px 0 0;
        }

        .container h1 {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .container h1 a {
            display: inline-block;
            background: #000;
            background: rgba(0, 0, 0, 0.05);
            padding: 10px 15px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            color: black;
            text-decoration: none;
            -webkit-transition: all .3s ease;
            -moz-transition: all .3s ease;
            -ms-transition: all .3s ease;
            -o-transition: all .3s ease;
            transition: all .3s ease;
        }

        .container h1 a:hover {
            background: rgba(0, 0, 0, 0.1);
        }

        .container p {
            margin-bottom: 30px;
            color: #d6f2e4;
            font-family: 'Proxima Nova', sans-serif;
            font-size: 50px;
        }

        .container .social-media ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .container .social-media ul li {
            display: inline-block;
            margin: 16px 0 0;
            font-size: 30px;
        }

        .container .social-media ul li:last-child {
            margin: 0;
        }

        .container .social-media ul li a {
            display: block;
            width: 50px;
            color: black;
        }


    </style>
</head>

<body>
<div class='container'>
    <h1>
        <!--<span data-sr='top wait .5s 90px'>INFO STATİON</span><br><br>-->
        <span data-sr='top wait .5s 90px'>COMİNG SOON..</span>
    </h1>
</div>
<script src='https://mintik.com/jQuery/jquery-1.10.2.min.js'></script>
<script src='scrollReveal.min.js'></script>
<script>
    window.sr = new scrollReveal(config);

    var config = {
        easing: 'ease',
        reset: true
    }

    (function(d) {
        var config = {
                kitId: 'xyl8bgh',
                scriptTimeout: 3000
            },
            h = d.documentElement,
            t = setTimeout(function() {
                h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
            }, config.scriptTimeout),
            tk = d.createElement("script"),
            f = false,
            s = d.getElementsByTagName("script")[0],
            a;
        h.className += " wf-loading";
        tk.src = '//use.typekit.net/' + config.kitId + '.js';
        tk.async = true;
        tk.onload = tk.onreadystatechange = function() {
            a = this.readyState;
            if (f || a && a != "complete" && a != "loaded") return;
            f = true;
            clearTimeout(t);
            try {
                Typekit.load(config)
            } catch (e) {}
        };
        s.parentNode.insertBefore(tk, s)
    })(document);

</script>
<script language="javascript" src="http://ir.sitekodlari.com/sagtusengelleme1.js"></script>

</body>

</html>
