@extends('layouts.app')

@section('title', 'Trang chủ')

@section('content')

<div class="container-fluid p-0">

    <!-- Danh sách liên kết -->
        <div class="list position-fixed top-10 start-0 m-3">
          <button
            class="btn btn-dark"
            data-bs-toggle="offcanvas"
            data-bs-target="#menuCanvas"
          >
            <i class="bi bi-list"></i>
          </button>
        </div>
        <div class="offcanvas offcanvas-start" id="menuCanvas">
          <div class="offcanvas-header">
            <a href="" class="logo-link-sideBar"
              ><img
                src="{{ asset('images/LOGO.png') }}"
                alt="LOGO"
                class="logo-img rounded-circle"
            /></a>

            <button class="btn-close" data-bs-dismiss="offcanvas"></button>
          </div>

          <div class="offcanvas-body d-flex flex-column gap-3">
            <a href="/" class="pages-link-sideBar d-block"> Trang chủ </a>
            <a href="{{ route('shop.index') }}" class="pages-link-sideBar d-block"> Sản phẩm </a>
            <a href="#" class="pages-link-sideBar d-block"> Giới thiệu </a>
            <a href="#" class="pages-link-sideBar d-block"> Về chúng tôi </a>
            <a href="#" class="pages-link-sideBar d-block"> Liên hệ </a>
            <span style="border-bottom: 1px solid #fff; display: block"></span>
            <div class="d-flex align-items-center">
              <!-- Đăng nhập trong side bar -->
              <div class="auth flex-grow-0 d-flex">
                <div class="auth-login">
                  @if(Auth::check())
                      <a href="{{ route('users.show', Auth::id()) }}"
                          class="auth-login-link">
                          <i class="bi bi-person-circle"></i>
                      </a>
                  @else
                      <a href="{{ route('login') }}" class="auth-login-link">
                          <i class="bi bi-box-arrow-right"></i>
                      </a>
                  @endif
                </div>
              </div>

              <!-- Giỏ hàng trong side bar -->
              <div class="cart flex-shrink-0 justify-content-center ms-4">
                <a href="{{ route('carts.index') }}" class="cart-link"><i class="bi bi-cart3"></i></a>
                <span class="cart-count">0</span>
              </div>
            </div>
          </div>
        </div>
        <!-- Video màn hình chính -->
        <section class="hero">
          <video autoplay muted loop>
            <source src="{{ asset('videos/coffee.mp4') }}" type="video/mp4" />
          </video>

          <nav aria-label="breadcrumb" class="mb-3 text-white">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active text-white" aria-current="page">
                Trang chủ
              </li>
            </ol>
          </nav>

          <div class="content">
            <h1>MỘT LY CÀ PHÊ CHO MỖI BUỔI SÁNG</h1>
            <p>Hãy tận hưởng trải nghiệm cà phê tuyệt vời nhất</p>
          </div>
        </section>

        <!-- Infinite Scrolling Text -->
        <div class="marquee">
          <div class="marquee-track">
            <span
              >TRÀ TRÁI CÂY <i class="bi bi-heart-arrow"></i> CÀ PHÊ
              <i class="bi bi-heart-arrow"></i> BÁNH NGỌT
              <i class="bi bi-heart-arrow"></i>
            </span>
            <span
              >TRÀ TRÁI CÂY <i class="bi bi-heart-arrow"></i> CÀ PHÊ
              <i class="bi bi-heart-arrow"></i> BÁNH NGỌT
              <i class="bi bi-heart-arrow"></i>
            </span>
            <span
              >TRÀ TRÁI CÂY <i class="bi bi-heart-arrow"></i> CÀ PHÊ
              <i class="bi bi-heart-arrow"></i> BÁNH NGỌT
              <i class="bi bi-heart-arrow"></i>
            </span>
            <span
              >TRÀ TRÁI CÂY <i class="bi bi-heart-arrow"></i> CÀ PHÊ
              <i class="bi bi-heart-arrow"></i> BÁNH NGỌT
              <i class="bi bi-heart-arrow"></i>
            </span>
          </div>
        </div>

        <!-- MÔ TẢ VỀ COFFEE-->
        <div
          class="coffee-card d-flex flex-column flex-lg-row justify-content-between align-items-center"
        >
          <div class="coffee-image col-lg-6">
            <img
              src="{{ asset('/images/coffee_description.jpg') }}"
              alt="Coffee Description"
            />
          </div>
          <div class="coffee-content col-lg-6">
            <h3 class="coffee-content-title fw-bold">
              NHỮNG HẠT CÀ PHÊ ĐƯỢC TUYỂN CHỌN
            </h3>
            <p class="fw-light">
              Những hạt cà phê được tuyển chọn kỹ lưỡng từ các vùng trồng nổi
              tiếng, trải qua quá trình rang xay tỉ mỉ để giữ trọn hương thơm tự
              nhiên và hương vị đậm đà. Mỗi hạt cà phê đều mang đến sự cân bằng
              hoàn hảo giữa vị đắng nhẹ, hậu ngọt tinh tế và hương thơm quyến
              rũ, tạo nên một tách cà phê chất lượng cho mọi khoảnh khắc trong
              ngày.
            </p>
            <p class="fw-light">
              Hạt cà phê nguyên chất với hương thơm nồng nàn, vị đậm đà và hậu
              vị êm dịu. Được chọn lọc và rang xay cẩn thận để mang đến trải
              nghiệm cà phê trọn vẹn trong từng tách.
            </p>
            <p class="fw-light">
              Từ những hạt cà phê được tuyển chọn cẩn thận đến quy trình rang
              xay chuẩn mực, chúng tôi mang đến hương thơm quyến rũ cùng vị cà
              phê đậm đà và cân bằng. Mỗi tách cà phê không chỉ là một thức uống
              mà còn là hành trình khám phá tinh hoa của nghệ thuật pha chế và
              niềm đam mê dành cho cà phê.
            </p>
          </div>
        </div>

        <!-- MÔ TẢ VỀ TRÀ TRÁI CÂY-->
        <div
          class="tea-card d-flex flex-column flex-lg-row justify-content-between align-items-center"
        >
          <div class="tea-content col-lg-6">
            <h3 class="tea-content-title fw-bold">TRÀ TRÁI CÂY THANH MÁT</h3>
            <p class="fw-light">
              Những lá trà được tuyển chọn kỹ lưỡng kết hợp cùng các loại trái
              cây tươi ngon, tạo nên hương vị thanh mát và tự nhiên trong từng
              ly trà. Sự hòa quyện giữa vị trà dịu nhẹ và hương thơm của trái
              cây mang đến cảm giác sảng khoái, giúp mỗi khoảnh khắc thưởng thức
              trở nên thư giãn và đầy cảm hứng.
            </p>
            <p class="fw-light">
              Trà trái cây được pha chế từ lá trà chất lượng cùng những nguyên
              liệu tươi ngon, mang đến hương thơm dễ chịu, vị ngọt thanh và chút
              chua nhẹ hài hòa. Mỗi ly trà là sự kết hợp hoàn hảo giữa hương vị
              tự nhiên và sự tươi mát, phù hợp để thưởng thức vào bất kỳ thời
              điểm nào trong ngày.
            </p>
            <p class="fw-light">
              Từ những lá trà thơm ngon đến các loại trái cây được lựa chọn cẩn
              thận, chúng tôi mang đến những ly trà trái cây đậm hương vị tự
              nhiên và đầy sức sống. Mỗi thức uống không chỉ giúp giải khát mà
              còn là sự kết hợp tinh tế giữa nghệ thuật pha chế và nguồn nguyên
              liệu tươi mới, mang đến trải nghiệm trọn vẹn trong từng ngụm trà.
            </p>
          </div>

          <div class="tea-image col-lg-6">
            <img
              src="{{ asset('images/tea_fruit_description.jpg') }}"
              alt="Tea Description"
            />
          </div>
        </div>

        <!-- MÔ TẢ VỀ BÁNH NGỌT -->

        <div
          class="bun-card d-flex flex-column flex-lg-row justify-content-between align-items-center"
        >
          <div class="bun-image col-lg-6">
            <img
              src="{{ asset('images/buns_description.jpg') }}"
              alt="Buns Description"
            />
          </div>
          <div class="bun-content col-lg-6">
            <h3 class="bun-content-title fw-bold">
              NHỮNG CHIẾC BÁNH NGỌT ĐƯỢC CHẾ BIẾN TỈ MỈ
            </h3>
            <p class="fw-light">
              Những chiếc bánh ngọt được làm từ những nguyên liệu tươi ngon,
              tuyển chọn kỹ lưỡng và chế biến theo công thức chuẩn để giữ trọn
              hương vị thơm ngon. Mỗi chiếc bánh là sự hòa quyện hoàn hảo giữa
              lớp bánh mềm mịn, vị ngọt thanh và hương thơm hấp dẫn, mang đến
              trải nghiệm tuyệt vời cho mọi khoảnh khắc trong ngày.
            </p>

            <p class="fw-light">
              Bánh ngọt thơm mềm với hương vị tự nhiên, độ ngọt hài hòa và kết
              cấu mềm mịn. Được chế biến cẩn thận từ những nguyên liệu chất
              lượng, mỗi chiếc bánh đều mang đến cảm giác ngon miệng và sự hài
              lòng trong từng miếng thưởng thức.
            </p>

            <p class="fw-light">
              Từ khâu lựa chọn nguyên liệu đến quá trình nướng bánh tỉ mỉ, chúng
              tôi luôn đặt chất lượng lên hàng đầu để tạo nên những chiếc bánh
              thơm ngon và đẹp mắt. Mỗi chiếc bánh không chỉ là một món tráng
              miệng mà còn là sự kết tinh của niềm đam mê làm bánh, mang đến
              những phút giây ngọt ngào và đáng nhớ cho mọi khách hàng.
            </p>
          </div>
        </div>

</div>

@endsection
