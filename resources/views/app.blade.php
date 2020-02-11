<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Osmos</title>
        <link href="/css/app.css" rel="stylesheet">


        <!-- Fonts -->
    </head>
    <body class="bg-gray-100">
       <div id="app">
           <div class="container font-sans">
               <header class="py-8 mb-8 md:hidden">
                   <div class="text-2xl">Osmos</div>
               </header>

               <main class="flex">
                   <aside class="w-1/4 px-6 bg-white h-screen">
                        <section class="py-8">
                            <div class="text-2xl">Osmos</div>
                        </section>
                        <section>
                            <ul>
                                <li class="pb-6">
                                    <router-link active-class="font-bold" to="/" exact>Dashboard</router-link>
                                </li>
                                <li class="pb-6">
                                    <router-link active-class="font-bold" to="/courses">Courses</router-link>
                                </li>
                                <li class="pb-6">
                                    <router-link active-class="font-bold" to="/planner">Planner</router-link>
                                </li>
                                <li class="pb-6">
                                    <router-link active-class="font-bold" to="/chat">Chat</router-link>
                                </li>
                                <li class="pb-6">
                                    <router-link active-class="font-bold" to="/settings">Settings</router-link>
                                </li>
                            </ul>
                        </section>
                   </aside>
                   <div class="flex-1 px-6">
                       <section class="py-8">
                            <router-view></router-view>
                       </section>
                   </div>
               </main>
           </div>
        </div>

        <script src="/js/app.js"></script>
    </body>
</html>
