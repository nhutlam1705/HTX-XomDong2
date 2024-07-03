
  // Sticky Navbar with scroll direction detection
let lastScrollTop = 0;

window.onscroll = function() {stickyNavbar()};

function stickyNavbar() {
    const navbar = document.getElementById("navbar");
    const currentScrollTop = window.pageYOffset;

    if (currentScrollTop > lastScrollTop && currentScrollTop > 50) {
        // Scrolling down and past 50px
        navbar.classList.add("sticky");
    } else if (currentScrollTop <= 50) {
        // Scrolling up and above 50px
        navbar.classList.remove("sticky");
    }

    lastScrollTop = currentScrollTop;
}

    document.getElementById('mobile-menu').addEventListener('click', function() {
          document.querySelector('.navbar-menu').classList.toggle('active');
      });

  function changeImage(imageSrc) {
    document.getElementById('largeImage').src = imageSrc;
}


 document.addEventListener('DOMContentLoaded', function () {
    const slider = document.getElementById('productSlider3');
    const slideLeft = document.getElementById('slideLeft3');
    const slideRight = document.getElementById('slideRight3');

    const slideWidth = slider.querySelector('.slide').clientWidth;

    slideLeft.addEventListener('click', function () {
        slider.scrollBy({
            left: -slideWidth * 3,
            behavior: 'smooth'
        });
    });

    slideRight.addEventListener('click', function () {
        slider.scrollBy({
            left: slideWidth * 3,
            behavior: 'smooth'
        });
    });
});


  function initializeSlider(sliderId, slideLeftId, slideRightId) {
      const slider = document.getElementById(sliderId);
      const slideLeft = document.getElementById(slideLeftId);
      const slideRight = document.getElementById(slideRightId);

      const slideWidth = slider.querySelector('.slide').clientWidth;

      slideLeft.addEventListener('click', function () {
          slider.scrollBy({
              left: -slideWidth * 1,
              behavior: 'smooth'
          });
      });

      slideRight.addEventListener('click', function () {
          slider.scrollBy({
              left: slideWidth * 1,
              behavior: 'smooth'
          });
      });
  }

  document.addEventListener('DOMContentLoaded', function () {
      // Initialize each slider with unique IDs
      initializeSlider('productSlider3', 'slideLeft3', 'slideRight3');
      initializeSlider('productSlider4', 'slideLeft4', 'slideRight4');
      // Add more sliders as needed
  });




  document.addEventListener('DOMContentLoaded', function () {
      const newsLinks = document.querySelectorAll('.news-link');
  
      newsLinks.forEach(link => {
          link.addEventListener('click', function (e) {
              e.preventDefault();
  
              const newsId = this.dataset.id;
  
              // Gửi yêu cầu AJAX để tăng số lần nhấp chuột
              fetch(`{{ url('news/increment-click') }}/${newsId}`, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json',
                      'X-CSRF-TOKEN': '{{ csrf_token() }}'
                  },
                  body: JSON.stringify({})
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      // Chuyển hướng đến trang chi tiết tin tức sau khi tăng số lần nhấp chuột
                      window.location.href = this.href;
                  }
              })
              .catch(error => console.error('Error:', error));
          });
      });
  });
