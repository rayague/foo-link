<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex flex-row-reverse relative">

        <header class="bg-white w-full shadow h-24">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">Recettes</h1>
            </div>
            <div class="flex-1 w-full p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card -->
                    <div class="bg-white p-4 rounded-lg hover:shadow-lg transition duration-300 ease-in-out shadow">
                        <h3 class="text-lg font-semibold">Total Recettes</h3>
                        <p class="mt-2 text-gray-600">Card content goes here.</p>
                    </div>

                    <!-- Chart -->
                    <div class="bg-white p-4 rounded-lg hover:shadow-lg transition duration-300 ease-in-out shadow">
                        <h3 class="text-lg font-semibold">Total Commentaires</h3>
                        <div class="mt-2">
                            <!-- Add your chart here -->
                        </div>
                    </div>
                    <!-- Chart -->
                    <div class="bg-white p-4 rounded-lg hover:shadow-lg transition duration-300 ease-in-out shadow">
                        <h3 class="text-lg font-semibold">Total Catégories</h3>
                        <div class="mt-2">
                            <!-- Add your chart here -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col p-4">

                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900">Récentes publications</h1>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus
                            ?</p>
                    </div>
                </div>
                <div class="flex flex-wrap">

                    <section class="grid place-items-center p-4 w-80">
                        <div
                            class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-lg">
                            <div
                                class="relative bg-clip-border pt-2 !mt-4 mx-4 rounded-xl overflow-hidden bg-white text-gray-700 rounded-none">
                                <p
                                    class="bg-blue-500 inline p-1 m-2 text-white bold rounded-md antialiased font-sans text-sm font-light leading-normal text-blue-gray-900 font-medium">
                                    Utilisateur
                                </p>

                                <p
                                    class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 mt-1 mb-2 text-[20px] font-bold">
                                    Autodesk looks to future of 3D printing with Project Escher
                                </p>
                            </div>
                            <div class="p-6 px-4 pt-0">
                                <p
                                    class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                                    I will be the leader of a company that ends up being worth billions of
                                    dollars, because I got the answers. I understand culture. I am the
                                    nucleus.
                                </p>
                            </div>
                            <div class="p-6 pt-0 px-4">
                                <button
                                    class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-gray-900"
                                    type="button" data-ripple-light="true">
                                    Voir plus
                                </button>
                            </div>
                        </div>
                    </section>
                    <section class="grid place-items-center p-4 w-80">
                        <div
                            class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-auto max-w-[24rem]">
                            <div
                                class="relative bg-clip-border pt-2 !mt-4 mx-4 rounded-xl overflow-hidden bg-white text-gray-700 rounded-none">
                                <p
                                    class="bg-blue-500 inline p-1 m-2 text-white bold rounded-md antialiased font-sans text-sm font-light leading-normal text-blue-gray-900 font-medium">
                                    Utilisateur
                                </p>
                                <p
                                    class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 mt-1 mb-2 text-[20px] font-bold">
                                    Autodesk looks to future of 3D printing with Project Escher
                                </p>
                            </div>
                            <div class="p-6 px-4 pt-0">
                                <p
                                    class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                                    I will be the leader of a company that ends up being worth billions of
                                    dollars, because I got the answers. I understand culture. I am the
                                    nucleus.
                                </p>
                            </div>
                            <div class="p-6 pt-0 px-4">
                                <button
                                    class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-gray-900"
                                    type="button" data-ripple-light="true">
                                    Voir plus
                                </button>
                            </div>
                        </div>
                    </section>
                    <section class="grid place-items-center p-4 w-80">
                        <div
                            class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md w-auto max-w-[24rem]">
                            <div
                                class="relative bg-clip-border pt-2 !mt-4 mx-4 rounded-xl overflow-hidden bg-white text-gray-700 rounded-none">
                                <p
                                    class="bg-blue-500 inline p-1 m-2 text-white bold rounded-md antialiased font-sans text-sm font-light leading-normal text-blue-gray-900 font-medium">
                                    Utilisateur
                                </p>
                                <p
                                    class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900 mt-1 mb-2 text-[20px] font-bold">
                                    Autodesk looks to future of 3D printing with Project Escher
                                </p>
                            </div>
                            <div class="p-6 px-4 pt-0">
                                <p
                                    class="block antialiased font-sans text-base font-light leading-relaxed text-inherit font-normal text-gray-600">
                                    I will be the leader of a company that ends up being worth billions of
                                    dollars, because I got the answers. I understand culture. I am the
                                    nucleus.
                                </p>
                            </div>
                            <div class="p-6 pt-0 px-4">
                                <button
                                    class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 px-6 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none bg-gray-900"
                                    type="button" data-ripple-light="true">
                                    Voir plus
                                </button>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </header>
        <div class="sticky h-screen flex">
            <div class="flex">
                <!-- Sidebar -->
                <div class=" w-64 bg-gray-800 text-white min-h-screen">
                    <div class="p-4">
                        <div class="p-4">
                            <h1 class="text-2xl font-bold text-center">Foo-link</h1>
                        </div>
                        <hr class="mt-4 mb-10">
                        <ul>
                            <li class="mt-2"><a href="index.php"
                                    class="flex block py-3 px-4 rounded-lg hover:bg-blue-500 bg-gray-700 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>Dashboard</a>
                            </li>
                            <li class="mt-2"><a href="recettes.php"
                                    class="flex block py-3 px-4 rounded-lg bg-blue-500 ">
                                    <svg fill="none" class="h-5 w-5" viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                        stroke="currentColor">
                                        <path stroke-width="2"
                                            d="M6.33,18.45v8.59c0,.41,.34,.75,.75,.75h15.13c.41,0,.75-.34,.75-.75v-8.6c1.91-.75,3.27-2.6,3.27-4.77,0-2.83-2.3-5.13-5.13-5.13-.56,0-1.13,.1-1.67,.28-1.2-1.87-3.24-3.01-5.49-3.01s-4.09,1.02-5.31,2.75c-3.06-.27-5.56,2.14-5.56,5.11,0,2.17,1.36,4.02,3.27,4.77Zm1.5,7.84v-1.87h13.63v1.87H7.83Zm13.63-7.48v4.11H7.83v-4.11h13.63ZM8.19,10.05c.18,0,.36,.02,.56,.05,0,0,.01,0,.02,0,1.72,.33,2.97,1.83,2.97,3.57,0,.41,.34,.75,.75,.75s.75-.34,.75-.75c0-2.05-1.23-3.85-3.04-4.67,.94-1.07,2.29-1.7,3.74-1.7,1.91,0,3.64,1.07,4.5,2.79,.09,.18,.25,.31,.43,.38,.19,.06,.39,.05,.57-.04,.52-.26,1.09-.4,1.65-.4,2,0,3.63,1.63,3.63,3.63s-1.63,3.63-3.63,3.63H8.19c-2,0-3.63-1.63-3.63-3.63s1.63-3.63,3.63-3.63Z" />
                                    </svg>
                                    Mes
                                    Recettes</a>
                            </li>
                            <li class="mt-2"><a href="commentaires.php"
                                    class="flex block py-3 px-4 rounded-lg hover:bg-blue-500 bg-gray-700 ">
                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1"
                                        viewBox="0 0 52 52" xml:space="preserve" stroke="currentColor">
                                        <g>
                                            <path stroke-width="4" d="M47.8,31c-0.1-0.4-0.1-0.8,0.1-1.2c1.3-2.3,2.1-4.9,2.1-7.7c0-8.8-7.6-16-17-16c-4.4,0-8.4,1.6-11.4,4.2
		C31.9,11.5,40,19.9,40,30.1c0,2.5-0.5,4.9-1.4,7.1c1.1-0.4,2.2-0.9,3.2-1.4c0.4-0.2,0.8-0.3,1.2-0.1l6.1,2.4
		c0.6,0.2,1.1-0.3,0.9-0.9L47.8,31z" />
                                            <g>
                                                <path stroke-width="4" d="M19,14.1c-9.4,0-17,7.2-17,16c0,2.8,0.8,5.4,2.1,7.7c0.2,0.4,0.3,0.8,0.1,1.2L2,45.1
			c-0.2,0.6,0.3,1.1,0.9,0.9L9,43.6c0.4-0.1,0.8-0.1,1.2,0.1c2.6,1.5,5.6,2.3,8.8,2.3c9.4,0,17-7.2,17-16C36,21.3,28.4,14.1,19,14.1
			z" />
                                            </g>
                                        </g>
                                    </svg>
                                    Mes
                                    Commentaires</a>
                            </li>
                            <li class="mt-2"><a href="categories.php"
                                    class="flex block py-3 px-4 rounded-lg hover:bg-blue-500 bg-gray-700 ">
                                    <svg fill="none" class="h-5 w-5 mr-1" stroke="currentColor" viewBox="0 0 32 32"
                                        id="icon" xmlns="http://www.w3.org/2000/svg">

                                        <rect stroke-width="2" x="14" y="25" width="14" height="2" />
                                        <polygon stroke-width="2"
                                            points="7.17 26 4.59 28.58 6 30 10 26 6 22 4.58 23.41 7.17 26" />
                                        <rect stroke-width="2" x="14" y="15" width="14" height="2" />
                                        <polygon stroke-width="2"
                                            points="7.17 16 4.59 18.58 6 20 10 16 6 12 4.58 13.41 7.17 16" />
                                        <rect stroke-width="2" x="14" y="5" width="14" height="2" />
                                        <polygon stroke-width="2"
                                            points="7.17 6 4.59 8.58 6 10 10 6 6 2 4.58 3.41 7.17 6" />
                                    </svg>
                                    Mes Catégories</a>
                            </li>
                            <li class="mt-2"><a href="profil.php"
                                    class="flex block py-3 px-4 rounded-lg hover:bg-blue-500 bg-gray-700 ">
                                    <svg class="h-5 w-5 bold" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                        <g id="style=fill">
                                            <g id="profile">
                                                <path stroke-width="2" id="vector (Stroke)" fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M6.75 6.5C6.75 3.6005 9.1005 1.25 12 1.25C14.8995 1.25 17.25 3.6005 17.25 6.5C17.25 9.3995 14.8995 11.75 12 11.75C9.1005 11.75 6.75 9.3995 6.75 6.5Z"
                                                    fill="none" />
                                                <path stroke-width="2" id="rec (Stroke)" fill-rule="evenodd"
                                                    clip-rule="evenodd"
                                                    d="M4.25 18.5714C4.25 15.6325 6.63249 13.25 9.57143 13.25H14.4286C17.3675 13.25 19.75 15.6325 19.75 18.5714C19.75 20.8792 17.8792 22.75 15.5714 22.75H8.42857C6.12081 22.75 4.25 20.8792 4.25 18.5714Z"
                                                    fill="none" stroke="currentColor" />
                                            </g>
                                        </g>
                                    </svg>
                                    Profil</a> </li>
                            <a href=""
                                class=" mt-64 block flex gap-1  bottom-5 bg-red-500 border-red-500 border-2 hover:border-red-700 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M20 12h-9.5m7.5 3l3-3-3-3m-5-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2h5a2 2 0 002-2v-1" />
                                </svg>
                                Déconnexion
                            </a>
                        </ul>
                    </div>
                </div>
                <!-- Main Content -->


            </div>
            <!-- Main Content -->

        </div>

    </div>
    <!-- Header -->

</body>

</html>