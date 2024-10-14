<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1 class="h1">PHP</h1>
    <button class="btn1">Change Text</button>
    <button id="hideText">Hide Text</button>
    <button id="showText">Show Text</button>
    <button id="toggleText">Toggle Text</button>
    <button id="chaining">Chaining</button>
    <button id="animate">Animate</button>
    <button id="css">CSS</button>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(() => {
            $('.btn1').click(() => {
                $('.h1').text('JavaScript');
            })
            $('.h1').on('mouseover', () => {
                $('.h1').text('PHP');
            })
            $('#hideText').click(() => {
                $('.h1').hide();
            })
            $('#showText').click(() => {
                $('.h1').show();
            })
            $('#toggleText').click(() => {
                $('.h1').toggle();
            })
            $('#chaining').click(() => {
                $('.h1').hide(1000).show(1000);
            })
            $('#animate').click(() => {
                $('.h1').animate({
                    fontSize: '50px',
                    opacity: 0.5,
                    marginLeft: '100px'
                }, 1000).animate({
                    fontSize: '32px',
                    opacity: 1,
                    marginLeft: '0px'
                }, 1000)
            })
            $('#css').click(() => {
                $('.h1').css({
                    color: 'red',
                    fontSize: '50px'
                })
            })
        })

        $.post({
            url: './ajax.php',
            data: {
                name: 'Yousuf Arman'
            },
            success: (response) => {
                console.log(response);
            }
        })
    </script>
</body>

</html>