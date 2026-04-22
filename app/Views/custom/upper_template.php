<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<!-- Include Poppins Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

<!-- Import Manrope font -->
<link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@700&display=swap" rel="stylesheet">


<style>
    body {
        display: block;
        margin: 0px;
    }

    .font-poppins {
        font-family: 'Poppins', sans-serif;
    }

    .font-inter {
        font-family: 'Inter', sans-serif;
    }

    /* ✅ ADD THIS */
    .font-georgia {
        font-family: Georgia, serif;
    }

    /* Class for Manrope */
    .font-manrope {
        font-family: 'Manrope', sans-serif;
    }

    /* Class for Helvetica */
    .font-helvetica {
        font-family: Helvetica, Arial, sans-serif;
    }

    .font-redhat {
        font-family: 'Red Hat Display', sans-serif;
    }

    .font-dmsans {
        font-family: 'DM Sans', sans-serif;
    }

    .font-pt-serif {
        font-family: 'PT Serif', serif;
        font-weight: 700;
        font-style: normal;
    }


    @keyframes scalePop {
        0% {
            transform: scale(0.5);
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    .animate-scale {
        animation: scalePop 0.3s ease-out;
    }


    .modal-backdrop.show:nth-of-type(2) {
        z-index: 1060;
    }

    .modal.show:nth-of-type(2) {
        z-index: 1065;
    }
</style>
</head>

<body>


    <div id="responseModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 font-poppins">
        <div class="bg-white rounded-xl p-6 w-[90%] max-w-sm text-center animate-scale">

            <!-- Icon -->
            <div id="modalIcon" class="mb-4 text-5xl"></div>

            <!-- Message -->
            <h2 id="modalTitle" class="text-xl font-semibold mb-2"></h2>
            <p id="modalMessage" class="text-gray-500 mb-4"></p>

            <button onclick="closeModal()"
                class="bg-[#FE002A] text-white px-4 sm:px-5 py-1.5 sm:py-1.5 rounded-md text-xs sm:text-sm md:text-base hover:bg-red-700 transition shadow-[0px_4px_4px_0px_#00000040]">
                Close
            </button>
        </div>
    </div>

    <script>
        function showModal(type, title, message) {
            const modal = document.getElementById("responseModal");
            const icon = document.getElementById("modalIcon");

            document.getElementById("modalTitle").innerText = title;
            document.getElementById("modalMessage").innerText = message;

            // Clear previous icon
            icon.innerHTML = "";

            // Add Font Awesome icon
            let faIcon = document.createElement("i");
            faIcon.classList.add("text-4xl"); // Adjust size with Tailwind

            if (type === "success") {
                faIcon.classList.add("fas", "fa-check-circle", "text-green-500"); // Font Awesome success icon
            } else {
                faIcon.classList.add("fas", "fa-times-circle", "text-red-500"); // Font Awesome error icon
            }

            icon.appendChild(faIcon);

            modal.classList.remove("hidden");
            modal.classList.add("flex");
        }

        function closeModal() {
            document.getElementById("responseModal").classList.add("hidden");
        }
    </script>