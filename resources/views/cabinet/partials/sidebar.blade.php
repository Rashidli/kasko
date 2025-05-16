<aside class="sidebar">
    <!-- logo head sidebar -->
    <div class="head-sidebar">
        <a class="logo" href="{{route('cabinet.welcome')}}"> <img src="{{asset('storage/' . $logo->image)}}" /> </a>
    </div>

    <!-- links sidebar -->
    <nav class="nav-sidebar">
        <ul class="ul-sidebar">
            <a href="/insurance_products.html" class="link-element active-link">
                <img src="{{asset('/')}}cabinet/images/icon1.svg" alt="" />
                <span>Sığorta məhsulları </span>

            </a>
            <a href="/my_contracts.html" class="link-element">
                <img src="{{asset('/')}}cabinet/images/icon2.svg" alt="" />
                <span>Müqavilələrim</span>
            </a>
            <a href="/bonus_companies.html" class="link-element">
                <img src="{{asset('/')}}cabinet/images/icon3.svg" alt="" />
                <span>Bonus kompaniyalar</span>
            </a>
        </ul>
    </nav>
</aside>
