<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fibonacci Sequence</title>
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

      @media (max-width: 768px) {
        .form-control {
          font-size: 16px;
        }

        .form-label {
          font-size: 14px;
        }

        .btn {
          font-size: 14px;
        }
      }

      @media (max-width: 425px) {
        .form-control {
          font-size: 14px;
        }

        .form-label {
          font-size: 12px;
        }

        .btn {
          font-size: 12px;
        }
      }
    </style>
  </head>

  <body>
    <div class="container mt-5">
      <div class="card mx-auto" style="max-width: 1200px; margin-top: 120px;">
        <div class="card-body">
          <h2 class="fw-bold text-center">Fibonacci Sequence</h2>
          <p class="lh-base fst-italic text-center">The Fibonacci sequence is a set of integers (the Fibonacci numbers) that starts with a zero, followed by a one, then by another one, and then by a series of steadily increasing numbers. The sequence follows the rule that each number is equal to the sum of the preceding two numbers.</p>
        </div>
      </div>

      <div class="card mx-auto mt-4" style="max-width: 1200px;">
        <div class="card-body">
          <form method="POST" action="">
            <div class="row g-3 align-items-center">
            <div class="col-12 text-center mt-3">
                <label for="numTerms" class="form-label fw-bold fs-5">
                  Input the number of terms:
                </label>
              </div>
              <!-- Input Field at the Top -->
              <div class="col-12">
                <input 
                  type="number" 
                  name="numTerms" 
                  class="form-control" 
                  id="numTerms" 
                  placeholder="Enter number of terms" 
                  required 
                  style="font-size: 18px; text-align: center;"
                />
              </div>
              
              <!-- Buttons at the Bottom -->
              <div class="col-12 d-flex justify-content-center mt-3">
                <button type="submit" class="btn btn-warning btn-lg me-2">Submit</button>
                <a href="index.html" class="btn btn-home btn-lg">Home</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numTerms'])): ?>
        <?php
            $numTerms = intval($_POST['numTerms']);
            $fibonacci = [];

            if ($numTerms < 3): ?>
                <div id="errorCard" class="card mx-auto mt-4" style="max-width: 1200px; background-color: #2c2c2c; border: 2px solid #39ff14;">
                    <div class="card-body">
                        <h2 class="fw-bold text-center" style="color: #ff073a;">Error</h2>
                        <p class="fs-4 mb-0 text-center" style="font-size: 18px; color: #fff;">Please enter a number greater than or equal to 3.</p>
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
        <div id="fibonacciCard" class="card mx-auto mt-4" style="max-width: 1200px;">
            <div class="card-body">
                <h2 class="fw-bold text-center">The Fibonacci Numbers:</h2>
                <p class="fs-4 mb-0 text-center"><?php echo implode(', ', $fibonacci); ?></p>
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
      <h2 class="text-center mb-4">How the Fibonacci Algorithm Works</h2>
      <div class="card">
        <div class="card-body">
          <p class="fs-5">The Fibonacci sequence is generated using a simple algorithm:</p>
          <ol class="fs-5">
            <li>Start with two initial numbers: 0 and 1.</li>
            <li>Calculate the next number by adding the two previous numbers.</li>
            <li>Repeat the process to generate the desired number of terms.</li>
          </ol>
          <p class="fs-5">For example, the first few terms of the Fibonacci sequence are:</p>
          <p class="fs-5">0, 1, 1, 2, 3, 5, 8, 13, 21, ...</p>
          <p class="fs-5">This algorithm is efficient and can be implemented using a simple loop in programming.</p>
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
              <p class="card-text">The Fibonacci sequence was introduced to the Western world by Leonardo of Pisa, also known as Fibonacci, in his book "Liber Abaci" in 1202.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Mathematical Properties</h5>
              <p class="card-text">The Fibonacci sequence is closely related to the golden ratio, as the ratio of successive Fibonacci numbers converges to the golden ratio.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Applications</h5>
              <p class="card-text">The Fibonacci sequence appears in nature, art, architecture, and computer algorithms, making it a fundamental concept in mathematics.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>