<!-- filepath: c:\Xampp\htdocs\Automata-Number-Sequence--master\Automata-Number-Sequence--master\fibonacci.php -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fibonacci Sequence</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
      body {
        background: url('bg-cover.png') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Roboto', sans-serif;
        color: #fff;
      }

      .card {
        background-color: #1a1a1a; /* Dark esports theme */
        border: 2px solid #39ff14; /* Neon green border */
        border-radius: 10px;
        box-shadow: 0 0 15px #39ff14; /* Neon glow effect */
      }

      .card h2 {
        font-family: 'Orbitron', sans-serif;
        font-size: 36px;
        color: #39ff14; /* Neon green text */
      }

      .card p {
        font-size: 18px;
        color: #d1d1d1; /* Light gray text */
      }

      .btn-warning {
        background-color: #39ff14; /* Neon green button */
        border: none;
        color: #000;
        font-family: 'Orbitron', sans-serif;
        font-size: 18px;
        transition: all 0.3s ease;
      }

      .btn-warning:hover {
        background-color: #000;
        color: #39ff14;
        box-shadow: 0 0 10px #39ff14, 0 0 20px #39ff14; /* Glow effect */
      }

      .btn-danger {
        background-color: #ff073a; /* Bright red button */
        border: none;
        font-family: 'Orbitron', sans-serif;
        font-size: 18px;
        transition: all 0.3s ease;
      }

      .btn-danger:hover {
        background-color: #000;
        color: #ff073a;
        box-shadow: 0 0 10px #ff073a, 0 0 20px #ff073a; /* Glow effect */
      }

      label {
        color: #39ff14; /* Neon green labels */
        font-family: 'Orbitron', sans-serif;
        font-size: 18px;
      }

      input {
        background-color: #333;
        color: #fff;
        border: 1px solid #39ff14;
        font-family: 'Roboto', sans-serif;
      }

      input:focus {
        border-color: #39ff14;
        box-shadow: 0 0 10px #39ff14;
      }
    </style>
  </head>

  <body>
    <div class="card position-absolute top-0 start-50 translate-middle-x" style="width: 1200px; margin-top: 150px;">
        <div class="card-body">
           <h2 class="fw-bold">Fibonacci Sequence</h2>
           <p class="lh-base fst-italic">The Fibonacci sequence is a set of integers (the Fibonacci numbers) that starts with a zero, followed by a one, then by another one, and then by a series of steadily increasing numbers. The sequence follows the rule that each number is equal to the sum of the preceding two numbers.</p>
        </div>
    </div>

    <div class="card position-absolute top-0 start-50 translate-middle-x" style="width: 1200px; margin-top: 320px;">
        <div class="card-body">
            <form method="POST" action="">
                <div class="row">
                    <label for="numTerms" class="col-sm-3 col-form-label col-form-label-lg fw-bold">Input the no. of terms: </label>
                    <div class="col-sm-7">
                        <input type="number" name="numTerms" class="form-control form-control-lg" id="numTerms" placeholder="Enter number" required>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-warning btn-lg">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numTerms'])): ?>
        <?php
            $numTerms = intval($_POST['numTerms']);
            $fibonacci = [];

            if ($numTerms < 3): ?>
                <div id="errorCard" class="card position-absolute top-0 start-50 translate-middle-x" style="width: 1200px; margin-top: 425px; background-color: #ff073a;">
                    <div class="card-body">
                        <h2 class="fw-bold" style="color: #fff;">Error</h2>
                        <p class="fs-4 mb-0" style="font-size: 18px; color: #fff;">Please enter a number greater than or equal to 3.</p>
                        <div class="mt-4 d-flex justify-content-end align-items-center">
                            <p class="fw-bold fs-4 mb-0 me-3">Try again?</p>
                            <form method="POST" action="" class="d-flex">
                                <button type="submit" name="tryAgain" class="btn btn-warning btn-lg me-2">YES</button>
                                <a href="index.html" class="btn btn-danger btn-lg">NO</a>
                            </form>
                        </div>
                    </div>
                </div>
            <?php else:
                $fibonacci[] = 0;
                $fibonacci[] = 1;
                for ($i = 2; $i < $numTerms; $i++) {
                    $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
                }
            ?>
        <div id="fibonacciCard" class="card position-absolute top-0 start-50 translate-middle-x" style="width: 1200px; margin-top: 425px;">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h2 class="fw-bold">The Fibonacci Numbers : </h2>
                    <h2 class="fw-bold pt-1 ps-1"><?php echo $numTerms; ?> terms</h2>
                </div>
                
                <p class="fs-4 mb-0"><?php echo implode(', ', $fibonacci); ?></p>
                <div class="mt-4 d-flex justify-content-end align-items-center">
                    <p class="fw-bold fs-4 mb-0 me-3">Try again?</p>
                    <form method="POST" action="" class="d-flex">
                        <button type="submit" name="tryAgain" class="btn btn-warning btn-lg me-2">YES</button>
                        <a href="index.html" class="btn btn-danger btn-lg">NO</a>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>