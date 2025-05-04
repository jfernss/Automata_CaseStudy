<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Euclidean Algorithm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="Fliptop.jpg" type="image/png" />

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

      .card h2, .card h5 {
        font-family: 'Orbitron', sans-serif;
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

      .btn-home {
        background-color: #007bff; /* Blue button */
        border: none;
        color: #fff;
        font-family: 'Orbitron', sans-serif;
        font-size: 18px;
        transition: all 0.3s ease;
      }

      .btn-home:hover {
        background-color: #0056b3;
        color: #fff;
        box-shadow: 0 0 10px #007bff, 0 0 20px #007bff; /* Glow effect */
      }

      @media (max-width: 768px) {
        .card {
          margin: 10px;
        }

        .card h2, .card h5 {
          font-size: 24px;
        }

        .card p {
          font-size: 16px;
        }

        label {
          font-size: 14px;
        }

        input {
          font-size: 14px;
        }

        .btn-warning, .btn-danger, .btn-home {
          font-size: 14px;
        }
      }
    </style>
  </head>

  <body>
    <div class="container mt-5">
      <div class="card mx-auto" style="max-width: 1200px; margin-top: 120px;">
        <div class="card-body">
          <h2 class="fw-bold text-center">Euclidean Algorithm</h2>
          <p class="lh-base fst-italic text-center">The Euclidean algorithm is a method for finding the greatest common divisor (GCD) of two integers. It works by repeatedly subtracting the smaller number from the larger one, or more efficiently, by dividing the larger number by the smaller and taking the remainder. This process continues until the remainder is zero.</p>
        </div>
      </div>

      <div class="card mx-auto mt-4" style="max-width: 1200px;">
        <div class="card-body">
          <form method="POST" action="">
            <div class="row g-3">
              <div class="col-12 col-md-6">
                <label for="num1" class="form-label fw-bold">Input first number:</label>
                <input type="number" name="num1" class="form-control" id="num1" placeholder="Enter number" required>
              </div>
              <div class="col-12 col-md-6">
                <label for="num2" class="form-label fw-bold">Input second number:</label>
                <input type="number" name="num2" class="form-control" id="num2" placeholder="Enter number" required>
              </div>
            </div>
            <div class="mt-4 text-center">
              <button type="submit" class="btn btn-warning btn-lg">Submit</button>
              <a href="index.html" class="btn btn-home btn-lg ms-2">Home</a>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['num1']) && isset($_POST['num2'])): ?>
        <?php
            $num1 = intval($_POST['num1']);
            $num2 = intval($_POST['num2']);
            $steps = [];

            if ($num1 <= 0 || $num2 <= 0): ?>
                <div id="errorCard" class="card mx-auto mt-4" style="max-width: 1200px; background-color: #2c2c2c; border: 2px solid #39ff14;">
                    <div class="card-body">
                        <h2 class="fw-bold text-center" style="color: #fff;">Error</h2>
                        <p class="fs-4 mb-0 text-center" style="font-size: 18px; color: #fff;">Please enter positive integers for both numbers.</p>
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
                $a = max($num1, $num2);
                $b = min($num1, $num2);

                while ($b != 0) {
                    $r = $a % $b;
                    $steps[] = "$a = $b × " . intdiv($a, $b) . " + $r";
                    $a = $b;
                    $b = $r;
                }
                $gcd = $a;
            ?>
            <div id="gcdCard" class="card mx-auto mt-4" style="max-width: 1200px;">
                <div class="card-body">
                    <h2 class="fw-bold text-center">The GCD of <?php echo $num1; ?> and <?php echo $num2; ?> is:</h2>
                    <h2 class="fw-bold text-center"><?php echo $gcd; ?></h2>
                    <p class="fs-4 mb-0 text-center">Steps:</p>
                    <p class="fs-4 mb-0 text-center"><?php echo implode('<br>', $steps); ?></p>
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

   
    <!-- Explanation Section -->
    <div class="container mt-5">
      <h2 class="text-center mb-4">How the Euclidean Algorithm Works</h2>
      <div class="card">
        <div class="card-body">
          <p class="fs-5">The Euclidean algorithm is used to find the greatest common divisor (GCD) of two integers:</p>
          <ol class="fs-5">
            <li>Start with two integers, a and b.</li>
            <li>Divide a by b and take the remainder, r.</li>
            <li>Replace a with b and b with r.</li>
            <li>Repeat the process until b becomes 0. The GCD is the last non-zero remainder.</li>
          </ol>
          <p class="fs-5">For example, to find the GCD of 48 and 18:</p>
          <p class="fs-5">48 = 18 × 2 + 12<br>18 = 12 × 1 + 6<br>12 = 6 × 2 + 0<br>The GCD is 6.</p>
          <p class="fs-5">This algorithm is efficient and widely used in mathematics and computer science.</p>
        </div>
      </div>
    </div>

    <!-- Additional Information Section -->
    <div class="container mt-5 mb-5" style="margin-top: 15rem;">
      <h2 class="text-center mb-4" style="margin-top: 5rem;">Additional Information</h2>
      <div class="row g-3">
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">History</h5>
              <p class="card-text">The Euclidean Algorithm was first described by the ancient Greek mathematician Euclid in his book "Elements" around 300 BCE. It is one of the oldest algorithms still in use today.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Inventor</h5>
              <p class="card-text">Euclid, often referred to as the "Father of Geometry," was a Greek mathematician who lived in Alexandria during the reign of Ptolemy I.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Applications</h5>
              <p class="card-text">The Euclidean Algorithm is used in cryptography, computer science, and number theory to compute the greatest common divisor (GCD) of two integers.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>