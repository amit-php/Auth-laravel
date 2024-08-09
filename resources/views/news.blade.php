<x-layout>
    <x-slot:title>
        News
    </x-slot>
<style>
            .news-item {
                margin-bottom: 30px;
                border: 1px solid #ddd;
                padding: 15px;
                border-radius: 5px;
                transition: box-shadow 0.3s;
            }
    
            .news-item:hover {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
    
            .news-item img {
                max-width: 100%;
                height: auto;
                border-radius: 5px;
            }
    
            .news-item h3 {
                margin-top: 10px;
                font-size: 1.5rem;
            }
    
            .news-item p {
                color: #666;
            }
        </style>
   
        <div class="container">
            <h1 class="mb-4">News Listing</h1>
            <div id="news-list" class="row">
                <!-- News item 1 -->
                <div class="col-md-4">
                    <div class="news-item">
                        <img src="https://via.placeholder.com/600x400" alt="News Image">
                        <h3>News Title 1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
    
                <!-- News item 2 -->
                <div class="col-md-4">
                    <div class="news-item">
                        <img src="https://via.placeholder.com/600x400" alt="News Image">
                        <h3>News Title 2</h3>
                        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
    
                <!-- News item 3 -->
                <div class="col-md-4">
                    <div class="news-item">
                        <img src="https://via.placeholder.com/600x400" alt="News Image">
                        <h3>News Title 3</h3>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                    </div>
                </div>
    
                <!-- News item 4 -->
                <div class="col-md-4">
                    <div class="news-item">
                        <img src="https://via.placeholder.com/600x400" alt="News Image">
                        <h3>News Title 4</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
                    </div>
                </div>
    
                <!-- News item 5 -->
                <div class="col-md-4">
                    <div class="news-item">
                        <img src="https://via.placeholder.com/600x400" alt="News Image">
                        <h3>News Title 5</h3>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt.</p>
                    </div>
                </div>
    
                <!-- News item 6 -->
                <div class="col-md-4">
                    <div class="news-item">
                        <img src="https://via.placeholder.com/600x400" alt="News Image">
                        <h3>News Title 6</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
            <div class="load-more-btn text-center ">
            <button id="load-more" class="btn btn-primary mt-3 mb-5">Load More</button>
            </div>
        </div>
    
       
</x-layout>
