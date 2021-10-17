  <!-- Copyright -->
  <div class=" container-fluid text-center p-4 footer   " style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 : linhdqph14703@fpt.edu.vn
    <a class="text-reset fw-bold" href="https://github.com/linhdangquang" target="_blank">github.com/linhdangquang</a>
  </div>
  <!-- Copyright -->
    



   
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      $("#checkAl").click(function () {
      $('input:checkbox').not(this).prop('checked', this.checked);
      });
      
      uncheckAll = document.getElementById('remove-checkAll');
      uncheckAll.addEventListener('click', function () {
        document.getElementById('form_product').reset();
      })
    
    </script>
    <script>
        function showPassw() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        const labels = [
          <?php
            foreach ($category as $key => $value) {
              echo '"' . $value['ten_loai'] . '"'. ',' ;
            }
            ?>
        ];
        const data = {
          labels: labels,
          datasets: [{
            label: 'Số lượng',
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            data: [
              <?php foreach ($productsQuantityByCategory as $quantity){
                echo $quantity . ',';
            }?>
            ],
            borderWidth: 1,
          }]
        };
        const config = {
          type: 'bar',
          data: data,
          options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        },
        };
        var myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

    </script>
  </body>

</html>