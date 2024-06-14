<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dangrek&family=Gabarito&family=Noto+Sans+Khmer:wght@300;400;500&display=swap" rel="stylesheet" />
    <title>Student Input Information</title>
</head>

<body>
    <div class="w-full h-full bg-slate-400">
        <!-- header -->
        <div class="w-full p-2 text-center text-gray-50 font-bold text-2xl">
            <h2>Student Input Information</h2>
        </div>

        <div class="w-full border-2 flex justify-center">
            <form action="RegisterStudent-process.php" class="w-6/12 border-2 p-2" method="POST" enctype="multipart/form-data">
                <div class="flex flex-row m-4">
                    <label for="" class="w-1/4">Student ID</label>
                    <input type="text" class="w-full" name="StudentID" required />
                </div>
                <div class="flex flex-row m-4">
                    <label for="" class="w-1/4">Student Name</label>
                    <input type="text" class="w-full" name="StudentName" required />
                </div>
                <div class="flex flex-row m-4">
                    <label for="" class="w-1/4">Gender</label>
                    <input type="text" class="w-full" name="Gender" required />
                </div>
                <div class="flex flex-row m-4">
                    <label for="" class="w-1/4">DOB</label>
                    <input type="date" class="w-full" name="DOB" required />
                </div>

                <div class="flex flex-row m-4">
                    <label for="" class="w-1/4">Email</label>
                    <input type="email" class="w-full" name="Email" required />
                </div>
                <div class="flex flex-row m-4">
                    <label for="" class="w-1/4">Phone Number</label>
                    <input type="text" class="w-full" name="PhoneNumber" required />
                </div>
                <div class="flex flex-row m-4">
                    <label for="" class="w-1/4">Image</label>
                    <input type="file" class="w-full" name="Image" />
                </div>
                <div class="w-full flex justify-center">
                    <input type="submit" value="Submit" class="px-6 py-3 bg-red-600 rounded-full text-lg text-gray-50 font-bold" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>