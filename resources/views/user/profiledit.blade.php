<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover"
    style="background-image:url('https://source.unsplash.com/1L71sPT5XKc');">

    <div class="max-w-4xl flex items-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0">

        <!-- Main Col -->
        <div class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-90 mx-6 lg:mx-0">
            <div class="p-4 md:p-12">

                <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

                <form action="/profile/update" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm font-bold text-gray-700">Name</label>
                        <input type="text" name="name" value="Your Name"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">What You Do</label>
                        <input type="text" name="occupation" value="Web Developer"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">Location</label>
                        <input type="text" name="location" value="Your Location"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600" />
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-gray-700">About You</label>
                        <textarea name="about" rows="4"
                            class="w-full mt-1 p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-600">Totally optional short description about yourself, what you do and so on.</textarea>
                    </div>

                    <div class="pt-4">
                        <button type="submit"
                            class="bg-green-700 hover:bg-green-900 text-white font-bold py-2 px-4 rounded-full">
                            Save Changes
                        </button>
                        <a href="/profile" class="ml-4 text-gray-600 hover:text-green-700 font-semibold">Cancel</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
