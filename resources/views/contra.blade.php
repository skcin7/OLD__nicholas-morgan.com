<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Destroy the Vile Red Falcon!</title>

    <link href="{{ url('css/nes.css?random=' . rand(1,99999)) }}" rel="stylesheet" type="text/css">
</head>
<body>
<header id="menu">
    <a class="menu-item mr-auto" href="{{ url('/') }}">‹ Back</a>
    <a class="menu-item" href="#" data-toggle="modal" data-target="#modal-controls">Controls</a>
</header>
<div class="container" id="container">
    <canvas id="nes-canvas" width="256" height="240" />
</div>

<div class="modal my-modal fade" id="modal-controls" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Controls</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">

                <table class="table table-bordered table-hover table-nonfluid">
                    <thead class="thead-dark">
                        <tr>
                            <th>Button</th>
                            <th>Player 1</th>
                            <th>Player 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Left</td>
                            <td>Left</td>
                            <td>Num-4</td>
                        </tr>
                        <tr>
                            <td>Right</td>
                            <td>Right</td>
                            <td>Num-6</td>
                        </tr>
                        <tr>
                            <td>Up</td>
                            <td>Up</td>
                            <td>Num-8</td>
                        </tr>
                        <tr>
                            <td>Down</td>
                            <td>Down</td>
                            <td>Num-2</td>
                        </tr>
                        <tr>
                            <td>A</td>
                            <td>X</td>
                            <td>Num-7</td>
                        </tr>
                        <tr>
                            <td>B</td>
                            <td>Z</td>
                            <td>Num-9</td>
                        </tr>
                        <tr>
                            <td>Start</td>
                            <td>Enter</td>
                            <td>Num-1</td>
                        </tr>
                        <tr>
                            <td>Select</td>
                            <td>Right Ctrl</td>
                            <td>Num-3</td>
                        </tr>
                    </tbody>
                </table>

                <p class="mb-0 text-muted">Sound does not work in Safari. Appears to work in all other major browsers.</p>
                <p class="mb-0 text-muted">Thanks and credit to <a href="https://github.com/bfirsh/jsnes" target="_blank">JSNES</a> for the emulator!</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Got It</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('js/app.js?random=' . rand(1,10000)) }}"></script>
<script type="text/javascript" src="https://unpkg.com/jsnes/dist/jsnes.min.js"></script>
<script type="text/javascript" src="{{ url('nes/nes-embed.js') }}"></script>
<script>
    window.onload = function() {
        nes_load_url("nes-canvas", "{{ url('nes/Contra.nes') }}");
    }
</script>
</body>
</html>