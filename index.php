<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <style>
        .preference {
            text-align: center;
            margin: 20px;
        }

        body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color:#bae5f5;
        }
    </style>
</head>

<body>
    <div class="container ">
        <h1 class="text-center">พยากรณ์อากาศ</h1>
        <div class="input-group preference" style="background-color:#bae5f5;">
            <input type="text" aria-label="Latitude" class="form-control col-5" placeholder="Latitude" id="Latitude">
            <input type="text" aria-label="Longitude" class="form-control col-5" placeholder="Longitude"
                id="Longitude"><br>
            <button class="btn  gap-2 col-2  "style="background-color:#80adbc;" type="button" id="btnCal">Load</button>
        </div>

        <div class="card text-center ">
            <div class="card-header text-muted"style="background-color:#cccccc;">
            </div>
            <div class="container mt-5 d-flex justify-content-center " id="cardWeather" style="width: 30rem; ">
            </div>
            <div class="card-footer text-muted" style="background-color:#cccccc;">
            </div>
        </div>
    </div>


  


</body>
<script>

    function setDefault() {
        var urlDefualt = "https://api.openweathermap.org/data/2.5/weather?lat=11.933295&lon=99.733226&appid=c59bf01dde1c125da316c8a2195864ca";
        $.getJSON(urlDefualt)
            .done((data) => {
                var datetime = convertHMS(data.dt);
                var sunrise = convertHMS(data.sys["sunrise"]);
                var sunset = convertHMS(data.sys["sunset"]);
                var place = (data.name);
                var windSpeed = (data.wind["speed"]);
                var temp = ((data.main["temp"] - 273).toFixed(0) + " °C");
                var humid = (data.main["humidity"] + "%");
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);

                    }
                })


                var line = "<div id='dataWeather'>";
                line += "<img src='https://paimayang.com/wp-content/uploads/2020/02/-%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%88%E0%B8%A7%E0%B8%9A%E0%B8%84%E0%B8%B5%E0%B8%A3%E0%B8%B5%E0%B8%82%E0%B8%B1%E0%B8%99%E0%B8%98%E0%B9%8C-%E0%B8%AD%E0%B9%80%E0%B8%A7%E0%B8%99%E0%B9%82%E0%B8%81-avengo-4-e1580892834296.jpg' class='card-img-top' ><div class='card-body'>"
                line += "<h5 class='card-title my-3 '>" + place + "</h5>";
                line += "<p class='card-text'>อุณหภูมิ : " + temp + "</p>";
                line += "<p class='card-text'>ความชื้นสัมพัทธ์ : " + humid + "</p>";
                line += "<p class='card-text'>อาทิตย์ขึ้นเวลา : " + sunrise + "</p>";
                line += "<p class='card-text'>อาทิตย์ตกเวลา : " + sunset + "</p>";
                line += "<p class='card-text'>เวลา: " + datetime + "</p>";



                line += "</div>"
                $("#cardWeather").append(line);
            }).fail((xhr, status, error) => { })
    }

    function LoadForcast() {
        var lat = $("#Latitude").val();
        var long = $("#Longitude").val();
        var url = "https://api.openweathermap.org/data/2.5/weather?lat=" + lat + "&lon=" + long + "&appid=c59bf01dde1c125da316c8a2195864ca"
        $.getJSON(url)
            .done((data) => {
                var datetime = convertHMS(data.dt);
                var sunrise = convertHMS(data.sys["sunrise"]);
                var sunset = convertHMS(data.sys["sunset"]);
                var place = (data.name);
                var windSpeed = (data.wind["speed"]);
                var temp = ((data.main["temp"] - 273).toFixed(0) + " °C");
                var humid = (data.main["humidity"] + "%");
                $.each(data.weather[0], (key, value) => {
                    for (let i = 0; i < (data.weather[0]).length; i++) {
                        console.log(value);

                    }
                })
                var line = "<div id='dataWeather'>";
                line += "<img src='https://paimayang.com/wp-content/uploads/2020/02/-%E0%B8%9B%E0%B8%A3%E0%B8%B0%E0%B8%88%E0%B8%A7%E0%B8%9A%E0%B8%84%E0%B8%B5%E0%B8%A3%E0%B8%B5%E0%B8%82%E0%B8%B1%E0%B8%99%E0%B8%98%E0%B9%8C-%E0%B8%AD%E0%B9%80%E0%B8%A7%E0%B8%99%E0%B9%82%E0%B8%81-avengo-4-e1580892834296.jpg' class='card-img-top' ><div class='card-body'>"
                line += "<h5 class='card-title my-3'> " + place + "</h5>";
                line += "<p class='card-text'>อุณหภูมิ : " + temp + "</p>";
                line += "<p class='card-text'>ความชื้นสัมพัทธ์ : " + humid + "</p>";
                line += "<p class='card-text'>อาทิตย์ขึ้นเวลา : " + sunrise + "</p>";
                line += "<p class='card-text'>อาทิตย์ตกเวลา : " + sunset + "</p>";
                line += "<p class='card-text'>เวลา : " + datetime + "</p>";



                line += "</div>"
                $("#cardWeather").append(line);

            }).fail((xhr, status, error) => { })
    }

    function convertHMS(value) {
        let time = value;
        var convert = new Date(time * 1000);
        var hours = convert.getHours();
        var minutes = "0" + convert.getMinutes();
        var seconds = "0" + convert.getSeconds();
        return (hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2));

    }








    $(() => {
        setDefault();
        $("#btnCal").click(() => {
            LoadForcast();
            $("#dataWeather").hide();

        });
    });
</script>


</html>
