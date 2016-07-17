<!DOCTYPE html>
<html>
    <head>
        <title>Hi</title>
	<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato', sans-serif;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 32px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">This site address is: <?=$name; ?></div>
		<div id="map" style="width: auto; height: 400px"></div>
				
            </div>
        </div>

	<script type="text/javascript">
		ymaps.ready(init);
		var myMap;

		function init(){     
	        myMap = new ymaps.Map("map", {
	            center: [55.76, 37.64],
        	    zoom: 7
	        });

		var loadingObjectManager = new ymaps.LoadingObjectManager('<?=$name; ?>/yamap?bbox=%b',
		      {   
	        // Включаем кластеризацию.
        	//	clusterize: true,
	        // Опции кластеров задаются с префиксом cluster.
        	//	clusterHasBalloon: false,
	        // Опции объектов задаются с префиксом geoObject
        	//	geoObjectOpenBalloonOnClick: false
		      });
		loadingObjectManager.objects.options.set('preset', 'islands#blueStretchyIcon');
		myMap.geoObjects.add(myMap.geoObjects.add(loadingObjectManager));
	    }
	</script>
    </body>
</html>
