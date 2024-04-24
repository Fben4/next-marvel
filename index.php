<?php

#definir api url usando const
const API_URL  = "https://whenisthenextmcufilm.com/api";


# Iniciar cURL; ch = cURL Handle

$ch = curl_init(API_URL);

//Indicar que queremos recibir el resultado de la peticion a la API y no lo renderice

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* Ejecutar peticion y guardar el resultado */

$result = curl_exec($ch);
$data =  json_decode($result, true); // array asociativo

curl_close($ch);




?>

<head>
    <meta charset="UTF-8" />
    <title>Next Marvel Movie</title>
    <meta name="description" content="Next Marvel Movie" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />

</head>

<main>

    <h1 >Next Marvel Movie</h1>
    <section>
        <img src="<?= $data["poster_url"] ?>" width="300" style="border-radius:20px"  alt="<?= $data["title"] ?>" />
    </section>

    <hgroup >
        <h2 style="font-size: 50px">
            <?= $data["title"] ?>
        </h2>
            <h3>
                Releasing on
                <span>
                <?= $data["days_until"] ?>

            </span>

                Days
            </h3>

        <p>
            Release date <?= $data["release_date"] ?>
        </p>
        <p>
            <?= $data["overview"] ?>
        </p>
        <p class="next">
            What's after?
            <?= $data["following_production"]["title"] ?>
        </p>
    </hgroup>
</main>




<style>
    :root {
    color-scheme: light dark;
        background: rgb(0,0,0);
        background: radial-gradient(circle, rgba(0,0,0,1) 0%, rgba(198,11,11,1) 28%, rgba(0,0,0,1) 100%);
    }

    body {
    display: grid;
    place-content: center;


    }

    h1{
        text-align: center;

    }

    span{
        font-size: 40px;
        padding-left: 5px;
    }

    section{
        display:flex;
        justify-content: center;

    }

    hgroup{
        display:flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    ;
    }

    .next{
        color: #ffc83d;
    }

</style>