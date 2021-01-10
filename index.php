<?php include "db.php"; ?>
<!-- <?php
    // wyciągam wszystkie wpisy, a wyzej lącznie z bazą danych ten plik
    $query = "SELECT * FROM list";
    $wpisy = mysqli_query($con, $query);
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control of expenses - project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container main">
        <div class="row">
            <div class="col">
                <h2 class="main-color-text">Control of expenses</h2>
                <h4>Your recent expenses</h4>
            </div>
        </div>
        <div class="row list">
            <div id="list" class="list-group w-100">
                <!-- To co jest w srodku ma sie powtarzać, do poki nie spotka endwhile. Tyle razy ile w tej tablicy asojacyjnej jest wierszy -->
                <?php $index = 0?>
                <?php while($wiersz = mysqli_fetch_assoc($wpisy)) : ?>
                <!-- Wyciągnięcie wpisów z bazy -->
                    <?php $index++?>
                    <div class='list-group-item flex-column align-items-start main-color-bg element'>
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"><span class="font-weight-bold">#<?php echo $index ?></span> <?php echo $wiersz["title"] ?></h5>
                            <small class="text-muted"><?php echo $wiersz["data"] ?></small>
                        </div>
                        <div class="mb-1"><em><?php echo $wiersz["amount"] ?></em></div>
                        <p class="mb-1"><?php echo $wiersz["description"] ?></p>
                        <small class="text-dark"><?php echo $wiersz["category"] ?></small>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="row form">
            <div class="col-4">
                <h4>Your recent expenses</h4>
                <p>Dodaj nowy wydatek do listy wydatków</p>
            </div>
            <div class="col-8">
            <form action="process.php" method="post" class="w-100">
                    <div class="form-group">
                        <label for="title">Tytuł</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Podaj tytuł">
                    </div>
                    <div class="form-group">
                        <label for="description">Opis</label>
                        <input type="text" class="form-control" name="description" id="title" placeholder="Podaj opis">
                    </div>
                    <div class="form-group">
                        <label for="amount">Kwota</label>
                        <input type="text" class="form-control" name="amount" id="amount" placeholder="Podaj kwote">
                    </div>
                    <div class="form-group">
                        <label for="category">Kategoria</label>
                        <input type="text" class="form-control" name="category" id="category" placeholder="Podaj kategorie">
                    </div>
                    <button type="submit" name="submitBtn" class="btn btn-primary w-100 mb-2">Dodaj do listy</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

