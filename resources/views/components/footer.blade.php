<footer class="border-t mt-16" style="background-color: var(--primary-dark); border-color: var(--accent-tan); color:var(--accent-tan);">
    
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-10">
            
            <div class="space-y-4">
                <a href="/" class="footer-headings" style="color: var(--primary-medium);">
                    Quiz<span style="color: var(--accent-tan);">Site</span>
                </a>
                <p class="text-sm leading-relaxed opacity-80" >
                    Your go-to platform for mastering General Knowledge. We provide high-quality MCQs for competitive exams and personal growth.
                </p>
            </div>

            <div>
                <h4 class="footer-headings" >Navigation</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="nav-link-base p-0! text-sm">Home</a></li>
                    <li><a href="{{route('userCategoryPage')}}" class="nav-link-base p-0! text-sm">Categories</a></li>
                    <li><a href="#" class="nav-link-base p-0! text-sm">About Us</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-headings" >Support</h4>
                <p class="text-sm mb-4 opacity-80" >Have questions or feedback? We’d love to hear from you.</p>
                <a href="mailto:busmasheikh2006@gmail.com" class="btn-signup-accent inline-block text-sm">
                    Contact Us
                </a>
            </div>

        </div>

        <div class="h-px w-full mb-6 opacity-30" style="background-color: var(--accent-tan);"></div>

        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm opacity-70" >
                © {{ date('Y') }} QuizSite. All Rights Reserved. Crafted for Learners.
            </p>
            
            <div class="flex space-x-4">
                <a href="#" class="opacity-60 hover:opacity-100 transition-opacity" >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
                <a href="#" class="opacity-60 hover:opacity-100 transition-opacity" >
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.76 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
            </div>
        </div>
    </div>

</footer>