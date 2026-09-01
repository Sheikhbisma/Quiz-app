<footer class="mt-16" style="background-image: linear-gradient(120deg, #0f0c29, #1e1b4b 55%, #312e81);">
    <div class="mx-auto max-w-7xl px-6 py-14">
        <div class="mb-10 grid grid-cols-1 gap-10 md:grid-cols-3">

            <div class="space-y-4">
                <a href="/" class="flex items-center gap-2">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl text-white gold-gradient">
                        <i class="bi bi-lightning-charge-fill text-lg"></i>
                    </span>
                    <span class="footer-headings">Quiz<span class="text-gradient">Site</span></span>
                </a>
                <p class="text-sm leading-relaxed text-indigo-100/70">
                    Your go-to platform for mastering General Knowledge. High-quality MCQs for competitive exams and personal growth.
                </p>
                <div class="flex gap-3 pt-1">
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/10 text-indigo-100 transition hover:bg-white/20">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/10 text-indigo-100 transition hover:bg-white/20">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/10 text-indigo-100 transition hover:bg-white/20">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="#" class="flex h-9 w-9 items-center justify-center rounded-xl bg-white/10 text-indigo-100 transition hover:bg-white/20">
                        <i class="bi bi-youtube"></i>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="footer-headings mb-4">Navigation</h4>
                <ul class="space-y-2.5">
                    <li><a href="/" class="text-sm font-medium text-indigo-100/70 transition hover:text-white">Home</a></li>
                    <li><a href="{{ route('userCategoryPage') }}" class="text-sm font-medium text-indigo-100/70 transition hover:text-white">Categories</a></li>
                    <li><a href="{{ route('quizdetails') }}" class="text-sm font-medium text-indigo-100/70 transition hover:text-white">My Quiz History</a></li>
                    <li><a href="{{ route('userlogin') }}" class="text-sm font-medium text-indigo-100/70 transition hover:text-white">Login</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-headings mb-4">Support</h4>
                <p class="mb-5 text-sm text-indigo-100/70">
                    Have questions or feedback? We'd love to hear from you.
                </p>
                <a href="mailto:busmasheikh2006@gmail.com" class="btn-signup-accent inline-block px-5 py-2.5 text-sm">
                    <i class="bi bi-envelope-fill"></i> Contact Us
                </a>
            </div>
        </div>

        <div class="mb-6 h-px w-full bg-white/10"></div>

        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
            <p class="text-sm text-indigo-100/60">
                &copy; {{ date('Y') }} QuizSite. All Rights Reserved. Crafted for Learners.
            </p>
            <p class="flex items-center gap-2 text-xs text-indigo-100/50">
                <span class="inline-block h-2 w-2 animate-pulse rounded-full bg-green-400"></span>
                All systems operational
            </p>
        </div>
    </div>
</footer>