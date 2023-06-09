<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forum - <?= $_GET['url']?></title>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
    />
    <script src="https://unpkg.com/@emoji-picker-element/emoji-picker-element@1.1.2"></script>
    <style>
      nav {
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
      }

      nav a {
        padding: 0.5rem 1rem;
      }
   
  .emoji-picker-react {
    position: absolute;
    bottom: 50px;
    right: 20px;
    z-index: 1000;
  }
  .typewriter {
      overflow: hidden; 
      border-right: 0.15em solid #333; 
      white-space: nowrap; 
      margin: 0 auto; 
      letter-spacing: 0.15em; 
      animation: typing 3.5s steps(40, end), blink .75s step-end infinite;
    }
    
    @keyframes typing {
      from {
        width: 0;
      }
      to {
        width: 100%;
      }
    }
   
    @keyframes blink {
      from, to {
        border-color: transparent;
      }
      50% {
        border-color: #333;
      }
    }
    </style>
  </head>
  <body>
  <div class="fixed inset-0 z-50 bg-white flex items-center justify-center" id="loading">
    <img width="80px" src="../img/pngwing.com.png" alt="">
    <h1 class="ml-3 text-gray-900  font-semibold tracking-wide ">Sabar Loading <span class="typewriter">....</span></h1>
  </div>
  
  <nav class="bg-white bg-opacity-50 backdrop-blur-lg fixed top-0 w-full">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img
                class="h-8 w-8"
                src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg"
                alt="Workflow"
              />
            </div>
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
              <?php if(isset($_GET['url']) && $_GET['url'] == "Home"){?>
                  <a href="#" class="text-gray-800 hover:text-gray-600 font-bold ">Home</a>
                <?php }else{?>
                  <a href="index.php?url=Home" class="text-gray-800 hover:text-gray-600 font-medium ">Home</a>
                <?php }?>
                <?php if(isset($_GET['url']) && $_GET['url'] == "Setting"){?>
                  <a href="setting_user.php?url=Setting" class="text-gray-800 hover:text-gray-600 font-bold ">Setting</a>
                <?php }else{?>
                  <a href="setting_user.php?url=Setting" class="text-gray-800 hover:text-gray-600 font-medium ">Setting</a>
                <?php }?>

                <?php if(isset($_GET['url']) && $_GET['url'] == "Teman"){?>
                  <a href="teman.php?url=Teman" class="text-gray-800 hover:text-gray-600 font-bold ">Teman</a>
                <?php }else{?>
                  <a href="teman.php?url=Teman" class="text-gray-800 hover:text-gray-600 font-medium ">Teman</a>
                <?php }?>
                  <a href="../logout.php"class="text-gray-800 hover:text-gray-600 font-medium">Logout</a>
              </div>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <button
              id="mobile-menu-btn"
              type="button"
              class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500"
              aria-expanded="false"
            >
              <span class="sr-only">Open main menu</span>
              <!-- Heroicon name: menu -->
              <svg
                class="block h-6 w-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
              <!-- Heroicon name: x -->
              <svg
                class="hidden h-6 w-6"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                aria-hidden="true"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div id="mobile-menu" class="hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
        <?php if(isset($_GET['url']) && $_GET['url'] == "Home"){?>
                  <a href="#" class="text-gray-800 hover:text-gray-600 font-bold ">Home</a>
                <?php }else{?>
                  <a href="index.php?url=Home" class="text-gray-800 hover:text-gray-600 font-medium ">Home</a>
                <?php }?>
                <?php if(isset($_GET['url']) && $_GET['url'] == "Setting"){?>
                  <a href="setting_user.php?url=Setting" class="text-gray-800 hover:text-gray-600 font-bold ">Setting</a>
                <?php }else{?>
                  <a href="setting_user.php?url=Setting" class="text-gray-800 hover:text-gray-600 font-medium ">Setting</a>
                <?php }?>

                <?php if(isset($_GET['url']) && $_GET['url'] == "Teman"){?>
                  <a href="teman.php?url=Teman" class="text-gray-800 hover:text-gray-600 font-bold ">Teman</a>
                <?php }else{?>
                  <a href="teman.php?url=Teman" class="text-gray-800 hover:text-gray-600 font-medium ">Teman</a>
                <?php }?>
                  <a href="../logout.php"class="text-gray-800 hover:text-gray-600 font-medium">Logout</a>
        </div>
      </div>
</nav>