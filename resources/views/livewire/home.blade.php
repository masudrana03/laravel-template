    <div class="bg-gray-100 min-h-screen p-4">


        <!-- Navigation -->
        <nav class="bg-white shadow-md sticky top-0 z-10">
            <div class="container mx-auto flex justify-between items-center p-4">
                <h1 class="text-2xl font-bold text-blue-600">Quick Finder</h1>
                <div class="flex space-x-6">
                    <a href="editor.html" class="text-gray-600 hover:text-blue-600 font-medium transition">Editor</a>
                    <a href="visual.html" class="text-gray-600 hover:text-blue-600 font-medium transition">Visual</a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="container mx-auto p-6 space-y-10">
            <!-- Section 1: Pinned Items -->
            <section>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Pinned Items</h2>
                <div id="pinnedItems" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Pinned Cards Dynamically Added Here -->

                    <div class="bg-white rounded-lg shadow-lg p-4 relative">
                        <!-- Card Header -->
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold cursor-pointer hover:text-blue-500 transition" onclick="toggleCardContent('card1')">
                                Card Name 1
                            </h2>
                            <!-- Action Icons -->
                            <div class="flex space-x-4">
                                <button class="text-blue-500 hover:text-blue-700 pin-btn" title="Pin">
                                    <i class="fas fa-thumbtack"></i>
                                </button>
                                <button class="text-green-500 hover:text-green-700" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Accordion Content -->
                        <div id="card1" class="hidden mt-4 space-y-4">
                            <!-- Like Section -->
                            <div>
                                <h3 class="text-md font-semibold cursor-pointer hover:text-blue-500 transition" onclick="toggleSection('likeSection1')">
                                    Like Section
                                </h3>
                                <div id="likeSection1" class="hidden mt-2 bg-blue-50 p-3 rounded">
                                    <p class="text-gray-700">This is the "Like" section content.</p>
                                </div>
                            </div>
                            <!-- Note Section -->
                            <div>
                                <h3 class="text-md font-semibold cursor-pointer hover:text-blue-500 transition" onclick="toggleSection('noteSection1')">
                                    Note Section
                                </h3>
                                <div id="noteSection1" class="hidden mt-2 bg-yellow-50 p-3 rounded">
                                    <p class="text-gray-700">This is the "Note" section content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 2: Search -->
            <section class="text-center">
                <input type="text" id="searchInput" placeholder="Search content..." class="w-full md:w-1/2 border border-gray-300 rounded-lg py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:outline-none" />
            </section>

            <!-- Section 3: All Items -->
            <section>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">All Items</h2>
                <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Sample Card -->
                    <div class="bg-white rounded-lg shadow-lg p-4 relative">
                        <!-- Card Header -->
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold cursor-pointer hover:text-blue-500 transition" onclick="toggleCardContent('card1')">
                                Card Name 1
                            </h2>
                            <!-- Action Icons -->
                            <div class="flex space-x-4">
                                <button class="text-blue-500 hover:text-blue-700 pin-btn" title="Pin">
                                    <i class="fas fa-thumbtack"></i>
                                </button>
                                <button class="text-green-500 hover:text-green-700" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Accordion Content -->
                        <div id="card1" class="hidden mt-4 space-y-4">
                            <!-- Like Section -->
                            <div>
                                <h3 class="text-md font-semibold cursor-pointer hover:text-blue-500 transition" onclick="toggleSection('likeSection1')">
                                    Like Section
                                </h3>
                                <div id="likeSection1" class="hidden mt-2 bg-blue-50 p-3 rounded">
                                    <p class="text-gray-700">This is the "Like" section content.</p>
                                </div>
                            </div>
                            <!-- Note Section -->
                            <div>
                                <h3 class="text-md font-semibold cursor-pointer hover:text-blue-500 transition" onclick="toggleSection('noteSection1')">
                                    Note Section
                                </h3>
                                <div id="noteSection1" class="hidden mt-2 bg-yellow-50 p-3 rounded">
                                    <p class="text-gray-700">This is the "Note" section content.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Cards (Clone the above block and update IDs) -->
                    <div class="bg-white rounded-lg shadow-lg p-4 relative">
                        <div class="flex justify-between items-center">
                            <h2 class="text-lg font-semibold cursor-pointer hover:text-blue-500 transition" onclick="toggleCardContent('card2')">
                                Card Name 2
                            </h2>
                            <div class="flex space-x-4">
                                <button class="text-blue-500 hover:text-blue-700" title="Pin">
                                    <i class="fas fa-thumbtack"></i>
                                </button>
                                <button class="text-green-500 hover:text-green-700" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </div>
                        </div>
                        <div id="card2" class="hidden mt-4 space-y-4">
                            <!-- Similar accordion sections for this card -->
                            <p class="text-gray-700">Accordion content for Card Name 2.</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        {{-- <!-- Footer -->
        <footer class="bg-gray-800 text-white text-center py-4 mt-10">
            <p class="text-sm">© 2024 Quick Finder. All rights reserved.</p>
        </footer> --}}



    </div>


    <!-- JavaScript -->
    <script>
        // Toggle card content expansion
        function toggleCardContent(cardId) {
            const content = document.getElementById(cardId);
            content.classList.toggle('hidden');
        }

        // Toggle individual accordion sections
        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            section.classList.toggle('hidden');
        }
    </script>


<script>
    // Event Listener for Pinning Cards
    document.querySelectorAll('.pin-btn').forEach(button => {
        button.addEventListener('click', () => {
            const card = button.closest('div');
            const pinnedItems = document.getElementById('pinnedItems');
            const allItems = document.getElementById('allItems');

            if (pinnedItems.contains(card)) {
                // Unpin the card
                allItems.appendChild(card);
                button.innerHTML = '<i class="fas fa-thumbtack"></i>';
            } else {
                // Pin the card
                pinnedItems.appendChild(card);
                button.innerHTML = '<i class="fas fa-times"></i>';
            }
        });
    });

    // Search Functionality
    document.getElementById('searchInput').addEventListener('input', event => {
        const query = event.target.value.toLowerCase();
        document.querySelectorAll('#allItems > div, #pinnedItems > div').forEach(card => {
            const content = card.textContent.toLowerCase();
            card.style.display = content.includes(query) ? 'block' : 'none';
        });
    });
</script>
