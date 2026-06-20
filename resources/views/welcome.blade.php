<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student System</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* 🌈 Animated gradient background */
        body {
            margin: 0;
            min-height: 100vh;
            overflow: hidden;
            background: linear-gradient(-45deg, #0f172a, #1e293b, #0ea5e9, #22c55e);
            background-size: 400% 400%;
            animation: gradientMove 12s ease infinite;
            font-family: 'Poppins', sans-serif;
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            25% {
                background-position: 50% 0%;
            }

            50% {
                background-position: 100% 50%;
            }

            75% {
                background-position: 50% 100%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* ✨ Floating glowing balls */
        .ball {
            position: absolute;
            border-radius: 50%;
            filter: blur(20px);
            opacity: 0.6;
            animation: float 10s infinite ease-in-out;
        }

        .ball1 {
            width: 200px;
            height: 200px;
            background: #38bdf8;
            top: 10%;
            left: 10%;
        }

        .ball2 {
            width: 250px;
            height: 250px;
            background: #22c55e;
            bottom: 10%;
            right: 10%;
            animation-delay: 2s;
        }

        .ball3 {
            width: 180px;
            height: 180px;
            background: #a855f7;
            top: 50%;
            left: 70%;
            animation-delay: 4s;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) scale(1);
            }

            25% {
                transform: translate(30px, -40px) scale(1.1);
            }

            50% {
                transform: translate(-40px, 30px) scale(1);
            }

            75% {
                transform: translate(20px, 20px) scale(1.2);
            }

            100% {
                transform: translate(0, 0) scale(1);
            }
        }

       
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="flex items-center font-[Poppins] justify-center">


    <div class="ball ball1"></div>
    <div class="ball ball2"></div>
    <div class="ball ball3"></div>

    
    <div class="text-center glass p-10 rounded-2xl shadow-2xl z-10">

        <h1 class="text-white text-5xl font-bold mb-2">
            Student System
        </h1>

        <p class="text-white/80 text-2xl mb-8">
            Smooth Dashboard Navigation
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <a href="{{ route('classes.index') }}"
                class="bg-white/20 hover:bg-white/30 text-white p-6 rounded-xl transition transform hover:scale-105">
                <i class="fas fa-chalkboard text-3xl mb-2"></i>
                <p class="font-bold">Classes</p>
            </a>

            <a href="{{ route('students.index') }}"
                class="bg-white/20 hover:bg-white/30 text-white p-6 rounded-xl transition transform hover:scale-105">
                <i class="fas fa-user-graduate text-3xl mb-2"></i>
                <p class="font-bold">Students</p>
            </a>

            <a href="{{ route('subjects.index') }}"
                class="bg-white/20 hover:bg-white/30 text-white p-6 rounded-xl transition transform hover:scale-105">
                <i class="fas fa-book text-3xl mb-2"></i>
                <p class="font-bold">Subjects</p>
            </a>

        </div>

    </div>

</body>

</html>
