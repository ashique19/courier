<!DOCTYPE html>
<html>
    @include('public.partials.head')
  <body class="@yield('bodyClass')" >
    
    @if( env('APP_DEBUG') == false )
    

    @endif

    
    <section class="hero">
      
      @include('public.navs.topbar')
      
      <!-- Hero content: will be in the middle -->
      <div class="hero-body padding-top-0 xs-padding-left-0 xs-padding-right-0">
        <div class="container has-text-centered">
          
          <article class="columns is-multiline">
    
          @yield('main')
      
          </article>
          
          
        </div>
      </div>
        
      
    </section>
        
    <!-- START SCRIPTS -->
    
    @foreach( front_js() as $js) <script type="text/javascript" src="{{ $js }}"></script> @endforeach
    
    @yield('js')
    <!-- END SCRIPTS -->
    
  </body>
</html>     

