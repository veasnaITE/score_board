<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  include 'head.php';
  ?>
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
  <div class="w-full h-screen bg-purple-950 m-0 p-0">
    <!-- one row -->
    <div class="w-full flex flex-row py-4 hover:cursor-pointer">
      <!-- profile -->
      <div class="w-1/2">
        <div class="flex items-center justify-start ml-20">
          <img src="../Image/profile.jpg" class="w-[100px] rounded-full border-2 border-blue-600 mr-5" alt="Profile Picture" />
          <div class="title">
            <h2 class="font-sans font-bold text-2xl text-gray-50">
              [HOR SONOEUN]
            </h2>
            <div class="subtitle">
              <h3 class="font-serif font-normal text-lg text-gray-300">
                [PHP & MySQL]
              </h3>
            </div>
          </div>
        </div>
      </div>
      <!-- total student -->
      <div class="w-1/2 flex flex-row justify-end mr-20 items-center">
        <!-- total student -->
        <div class="mr-7 flex flex-col justify-center items-center">
          <h2 class="text-2xl text-gray-50 font-bold font-sans">150</h2>
          <h4 class="text-lg text-gray-300 font-medium">Students</h4>
        </div>
        <!-- total subjects -->
        <div class="mr-7 flex flex-col justify-center items-center">
          <h2 class="text-2xl text-gray-50 font-bold font-sans">5</h2>
          <h4 class="text-lg text-gray-300 font-medium">Subjects</h4>
        </div>
        <!-- total exams -->
        <div class="mr-7 flex flex-col justify-center items-center">
          <h2 class="text-2xl text-gray-50 font-bold font-sans">30</h2>
          <h4 class="text-lg text-gray-300 font-medium">Exams</h4>
        </div>
      </div>
    </div>

    <!-- add now -->
    <div class="w-full p-5 bg-purple-600">
    <form action="add_score_process.php" id="scoreForm" class="flex flex-row justify-between mx-6 items-center" method="POST">
      <div class="w-2/12">
        <label for="class" class="text-white font-bold text-base">CLASS</label>
        <input type="text" id="class" name="class" class="w-11/12 outline-none rounded-lg py-2 px-4 text-sm font-sans focus:text-blue-800" />
      </div>
      <div class="w-2/12">
        <label for="semester" class="text-white font-bold text-base">SEMESTER</label>
        <select name="semester" id="semester" class="w-11/12 outline-none rounded-lg py-2 px-4 text-sm font-sans focus:text-blue-800">
          <option value="1">Semester 1</option>
          <option value="2">Semester 2</option>
          <option value="3">Semester 3</option>
          <option value="4">Semester 4</option>
        </select>
      </div>
      <div class="w-2/12">
        <label for="subject" class="text-white font-bold text-base">SUBJECT</label>
        <input type="text" id="subject" name="subject" class="w-11/12 outline-none rounded-lg py-2 px-4 text-sm font-sans focus:text-blue-800" />
      </div>
      <div class="w-2/12">
        <label for="name" class="text-white font-bold text-base">STUDENT NAME</label>
        <input type="text" id="name" name="name" class="w-11/12 outline-none rounded-lg py-2 px-4 text-sm font-sans focus:text-blue-800" />
      </div>
      <div class="w-2/12">
        <label for="midterm" class="text-white font-bold text-base">MID-TERM SCORE</label>
        <input type="text" id="midterm" name="midterm" class="w-11/12 outline-none rounded-lg py-2 px-4 text-sm font-sans focus:text-blue-800" />
      </div>
      <div class="w-2/12">
        <label for="final" class="text-white font-bold text-base">FINAL SCORE</label>
        <input type="text" id="final" name="final" class="w-11/12 outline-none rounded-lg py-2 px-4 text-sm font-sans focus:text-blue-800" />
      </div>
      <div class="w-4/12">
        <input type="submit" id="submit" name="submit" class="px-4 py-2 bg-slate-100 rounded-full text-blue-900 font-bold transform duration-200 hover:bg-red-500">
      </div>
    </form>
  </div>

    <!-- table -->
    <div class="w-full bg-purple-950">
      <!-- head -->
      <div class="w-4/12 flex flex-row justify-around items-center p-4 text-lg font-bold text-white hover:cursor-pointer">
        <div>
          <h2>All</h2>
        </div>
        <div>
          <h2>Class Exam</h2>
        </div>
        <div>
          <h2>Online Exam</h2>
        </div>
        <div>
          <h2>Missed Exam</h2>
        </div>
      </div>

      <!-- head table -->
      <table class="w-screen border border-solid table-auto hover:cursor-pointer">
        <thead class="text-lg text-white">
          <tr>
            <th class="py-3 border w-1/12">Transaction ID</th>
            <th class="py-3 border w-2/12">Student Name</th>
            <th class="py-3 border w-fit">Semester</th>
            <th class="py-3 border w-fit">Subject</th>
            <th class="py-3 border w-fit">Mid-Term Score</th>
            <th class="py-3 border w-fit">Final Score</th>
            <th class="py-3 border w-fit">Total Score</th>
            <th class="py-3 border w-fit">Grade</th>
            <th class="py-3 border w-fit">More</th>
          </tr>
        </thead>

        <!-- <tbody class="text-base text-gray-100 font-bold text-center border">
          <tr>
            <td class="py-2 items-center justify-center border">00001</td>
            <td class="flex flex-row justify-around items-center py-2 text-center">
              <img src="../Image/profile.jpg" class="w-[60px] rounded-full border-blue-600 border" alt="Profile Picture" />
              <h4>Student's Name</h4>
            </td>
            <td class="py-2 items-center justify-center border">6</td>
            <td class="py-2 items-center justify-center border">PHP & MySQL</td>
            <td class="py-2 items-center justify-center border">40</td>
            <td class="py-2 items-center justify-center border">45</td>
            <td class="py-2 items-center justify-center border">85</td>
            <td class="py-2 items-center justify-center border">B</td>
            <td class="py-2 items-center justify-center border hover:cursor-pointer more relative">
              <h4>. . .</h4>
              <div class="more-chose w-fit bg-red-50 py-1 px-2 absolute text-black hidden rounded-lg">
                <div class="border-b-2 border-black hover:text-blue-800">
                  Edit
                </div>
                <div class="hover:text-red-800">Delete</div>
              </div>
            </td>
          </tr>
        </tbody> -->
        <tbody class="text-base text-gray-100 font-bold text-center border">
      <!-- Table data will be dynamically added here -->
      </tbody>
      </table>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      // Fetch and populate the subject options
      $("#scoreForm").submit(function(event) {
        event.preventDefault(); // Prevent the form from submitting

        var subject = $("#subject").val();
        var className = $("#class").val();

        // Fetch the data
        $.ajax({
          type: "POST",
          url: "fetch_data.php",
          data: {
            subject: subject,
            class: className
          },
          success: function(data) {
            // Update the table with the fetched data
            $("#dataTable tbody").html(data);

            // Allow the form to submit
            $("#scoreForm").off("submit").submit();
          }
        });
      });
    });
  </script>
  <!-- <script type="text/javascript">
     $(document).ready(function() {
      $("#fetchData").click(function() {
        var subject = $("#subject").val();
        var className = $("#class").val();
        console.log(subject,className);
        $.ajax({
          type: "POST",
          url: "fetch_data.php",
          data: {
            subject: subject,
            class: className
          },
          success: function(data) {
            $("#dataTable tbody").html(data);
          }
        });
      });
    });
    $(document).ready(function() {
      $(".more").on("click", function() {
        $(this).find(".more-chose").toggleClass("hidden");
      });
    });
  </script> -->
</body>
</html>
