@extends('layout.base')

@section('content')
    <!-- Content Div -->
    <div class="p-6 md:p-10 sm:ml-64 lg:ml-96 w-max-full h-screen">
        <div class="mb-4">
            <p class="text-[18px] md:text-xl font-bold">About the Developers</p>
        </div>
        <div class="grid grid-cols-2 gap-8 mt-10">
            <!-- Developer 1 -->
            <div class="flex col-span-2 xl:col-span-1">
                <!-- Profile photo -->
                <div class="flex w-[100px] xl:w-[120px] h-[100px] xl:h-[120px] rounded-full aspect-square bg-cover bg-red-500 border-4 xl:border-8 border-white drop-shadow-lg items-end justify-end"
                    style="background-image: url({{ asset('assets/images/bryan.png') }})"></div>
                <div class="flex flex-col ml-4 justify-start">
                    <p class="font-bold text-base lg:text-2xl">Bryan Joseph E. Aguinaldo</p>
                    <p class="text-neutral-500 text-xs lg:text-sm">Back-end Developer</p>
                    <p class="mt-2 text-xs lg:text-sm text-justify">
                        Bryan Joseph Aguinaldo is a 21-year-old 4th year BS in Computer Engineering student who has a
                        passion for
                        BING CHILLING and web development. Despite not having formal training, he has acquired valuable
                        skills as
                        a self-taught web developer. His dedication to learning has allowed him to create impressive
                        projects,
                        showcasing his ability to code creatively and efficiently.
                    </p>
                </div>
            </div>
            <!-- Developer 2 -->
            <div class="flex col-span-2 xl:col-span-1">
                <!-- Profile photo -->
                <div class="flex w-[100px] xl:w-[120px] h-[100px] xl:h-[120px] rounded-full aspect-square bg-cover bg-red-500 border-4 xl:border-8 border-white drop-shadow-lg items-end justify-end"
                    style="background-image: url({{ asset('assets/images/sachi.jpg') }})"></div>
                <div class="flex flex-col ml-4 justify-start">
                    <p class="font-bold text-base lg:text-2xl">Sachiko Niki Bernal</p>
                    <p class="text-neutral-500 text-xs lg:text-sm">Front-end Developer</p>
                    <p class="mt-2 text-xs lg:text-sm text-justify">
                        Sachiko Bernal is a half-Japanese 4th year Computer Engineering student with a passion for combining
                        her
                        creative talents in art and design with her technical skills in front-end development. She is
                        excited
                        about the possibilities of exploring game development, and would love to try making one in the
                        future. Her
                        love for ducks may seem quirky, but it is a testament to her ability to find inspiration in
                        unexpected
                        places. Sachiko is committed to learning and growing in her field, and to using her skills to make a
                        positive impact.
                    </p>
                </div>
            </div>
            <!-- Developer 3 -->
            <div class="flex col-span-2 xl:col-span-1">
                <!-- Profile photo -->
                <div class="flex w-[100px] xl:w-[120px] h-[100px] xl:h-[120px] rounded-full aspect-square bg-cover bg-red-500 border-4 xl:border-8 border-white drop-shadow-lg items-end justify-end"
                    style="background-image: url({{ asset('assets/images/chi.png') }})"></div>
                <div class="flex flex-col ml-4 justify-start">
                    <p class="font-bold text-base lg:text-2xl">John Matthew F. Chi</p>
                    <p class="text-neutral-500 text-xs lg:text-sm">Quality Assurance Testing</p>
                    <p class="mt-2 text-xs lg:text-sm text-justify">
                        John Matthew Chi is a driven and dedicated 4th year Computer Engineering student with a passion for
                        all
                        things tech-related. His love for technology extends beyond the classroom and into his personal
                        life,
                        where he spends much of his free time exploring the latest video games and software. But that's not
                        all -
                        John is also a huge fan of Star Wars, having grown up with the iconic franchise and all of its epic
                        space
                        battles and memorable characters. Whether it's watching the films or reading the books, John can
                        always be
                        found immersed in the Star Wars universe. Aside from his love of technology and Star Wars, John is
                        also an
                        animal lover, with a special affinity for cats and dogs.
                    </p>
                </div>
            </div>
            <!-- Developer 4 -->
            <div class="flex col-span-2 xl:col-span-1">
                <!-- Profile photo -->
                <div class="flex w-[100px] xl:w-[120px] h-[100px] xl:h-[120px] rounded-full aspect-square bg-cover bg-red-500 border-4 xl:border-8 border-white drop-shadow-lg items-end justify-end"
                    style="background-image: url({{ asset('assets/images/lex.png') }})"></div>
                <div class="flex flex-col ml-4 justify-start">
                    <p class="font-bold text-base lg:text-2xl">Lex Marcus A. Coronel</p>
                    <p class="text-neutral-500 text-xs lg:text-sm">Deployment</p>
                    <p class="mt-2 text-xs lg:text-sm text-justify">
                        He is Lex Marcus A. Coronel, a 4th Year Student of Computer Engineering Department with a lot
                        interests on
                        cybersecurity and deployment of projects in the internet. He is naturally curious on how stuff works
                        and
                        thats why he spend a lot of time studying different stuff, from the newest technology to the
                        strategies
                        you need to win the boss fight. With curiousity, passion and power of anime in his side, he will
                        surely
                        attain everything that sets his mind on. Let's just hope he doesn't get distracted along the way
                        since
                        keeping focus is still his weakness in everyday life. In the future, he hope that his hardwork today
                        will
                        bear fruit one day that he can be proud of.
                    </p>
                </div>
            </div>
            <!-- Developer 5 -->
            <div class="flex col-span-2 xl:col-span-1">
                <!-- Profile photo -->
                <div class="flex w-[100px] xl:w-[120px] h-[100px] xl:h-[120px] rounded-full aspect-square bg-cover bg-red-500 border-4 xl:border-8 border-white drop-shadow-lg items-end justify-end"
                    style="background-image: url({{ asset('assets/images/vincent.jpg') }})"></div>
                <div class="flex flex-col ml-4 justify-center">
                    <p class="font-bold text-base lg:text-2xl">Jan Vincent M. Rañopa</p>
                    <p class="text-neutral-500 text-xs lg:text-sm">Quality Assurance Testing</p>
                    <p class="mt-2 text-xs lg:text-sm text-justify">
                        Meet Jan Vincent Rañopa, a 4th Year Computer Engineering Student with a unique set of interests and
                        passions. Not only is he a lover of chemistry, but he is also an aspiring businessman, a gamer, and
                        a pet
                        lover who has a vision of starting his own Pet Cafe called Nekohi. In addition to these pursuits,
                        Jan
                        Vincent Rañopa is a hopeless romantic who enjoys watching Boy's Love series. With his diverse
                        interests
                        and drive to succeed, Jan Vincent Rañopa is a force to be reckoned with, and he is sure to achieve
                        great
                        things in the future.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
