<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #main{
        width:85%;
        height:100vh;
    }
</style>
<body>
    <?= view_cell('App\Controllers\Home::index') ?>
    <main id="main">
        <div class="row justify-content-evenly align-items-center mt-5" style="height:70%;">
            <div class="col-7">
                <div class="card">
                    <!-- <div class="card-header"></div> -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Column 1</th>
                                        <th scope="col">Column 2</th>
                                        <th scope="col">Column 3</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                    </tr>
                                    <tr class="">
                                        <td scope="row">Item</td>
                                        <td>Item</td>
                                        <td>Item</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="bg-success rounded border border-dark row">
                    <h4 class="text-light col-7 fs-1">0</h4>
                    <p class="col-5 fs-1 text-center"><i class="fa-solid fa-layer-group fs-1 text-light"></i></p>
                    <p class="text-light fs-5 b-round col-12">Total de Proyecto</p>
                </div>
                <div class="bg-success rounded border border-dark row mt-3">
                    <h4 class="text-light col-7 fs-1">0</h4>
                    <p class="col-5 fs-1 text-center"><i class="fa-solid fa-chart-simple fs-1 text-light"></i></p>
                    <p class="text-light fs-5 b-round col-12">Total de Proyecto</p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>