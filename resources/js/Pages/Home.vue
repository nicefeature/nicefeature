<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-white text-black/50">

        <div
            class="relative flex min-h-screen flex-col items-center"
        >
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl flex flex-col min-h-screen">
                <header
                    class="flex py-10 justify-between"
                >
                    <div>
                        <Link href="/" class="flex items-center justify-center font-semibold font-serif text-3xl text-indigo-600">
                            nice<span class="italic">f</span>eature
                        </Link>
                    </div>
                    <nav v-if="canLogin" class="flex items-center">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6 flex-1 flex items-center justify-center">
                    Public feedback overview will come here
                </main>

                <footer
                    class="py-16 text-center text-sm text-black dark:text-white/70"
                >
                    powered by nicefeature
                </footer>
            </div>
        </div>
    </div>
</template>
