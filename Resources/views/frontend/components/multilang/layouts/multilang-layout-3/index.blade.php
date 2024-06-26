<div id="multiLangLayout3" class="multi-lang {{$multiflagClasses}}">
  <div class="dropdown">
    @if($showButton)
      <?php
      $hash = sha1($butonComponentNamespace);
      if (isset($component)) {
        $__componentOriginal[$hash] = $component;
      }
      $component = $__env->getContainer()->make($butonComponentNamespace, array_merge([
        'idButton' => 'buttonDropdownMultilang',
        'label' => $longText ? config('available-locales')[LaravelLocalization::getCurrentLocale()]['native'] : LaravelLocalization::getCurrentLocale(),
        'withLabel' => true,
        'buttonClasses' => !empty($linkClasses) ? $linkClasses : 'btn dropdown-toggle border-0 text-capitalize text-bold',
      ], $buttonComponentAtributtes ?? []));

      $component->withName($butonComponent);
      if ($component->shouldRender()):
        $__env->startComponent($component->resolveView(), $component->data());
        if (isset($__componentOriginal[$hash])):
          $component = $__componentOriginal[$hash];
          unset($__componentOriginal[$hash]);
        endif;
        echo $__env->renderComponent();
      endif;
      ?>
    @endif

    <div id="imageDropdownMultilang" data-toggle="dropdown">
      @include('isite::frontend.components.multilang.partials.image', array(
        'styleFlag' => !empty($flagStyles) ? $flagStyles : 'width: 35px; height: 33px; object-fit: cover;',
        'classFlag' => !empty($flagClasses) ? $flagClasses : 'rounded-circle mx-2',
        'locale' => LaravelLocalization::getCurrentLocale())
      )
    </div>

    <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="{{$component->idButton}}">
      @foreach($locales as $locale)
        <div class="item-dropdown py-3">

          @include('isite::frontend.components.multilang.partials.image', array(
          'styleFlag' => $flagStyles ?? 'width: 30px; height: 30px; object-fit:cover',
          'classFlag' => $flagClasses ?? 'rounded-circle ml-3 mr-2',
          'locale' => $locale)
          )

          @if($showButton)
            <?php
            $hash = sha1($butonComponentNamespace);
            if (isset($component)) {
              $__componentOriginal[$hash] = $component;
            }
            $component = $__env->getContainer()->make($butonComponentNamespace, array_merge([
              'label' => $longTextDrop ? config('available-locales')[$locale]['native'] : $locale,
              'href' => setLocaleInUrl($locale),
              'withLabel' => true,
              'buttonClasses' => 'text-white text-left btn-lg border-0 px-2 pr-0 text-capitalize text-bold',
              'style' => ''
            ], $buttonDropDownItemComponentAtributtes ?? []));
            $component->withName($butonComponent);
            if ($component->shouldRender()):
              $__env->startComponent($component->resolveView(), $component->data());
              if (isset($__componentOriginal[$hash])):
                $component = $__componentOriginal[$hash];
                unset($__componentOriginal[$hash]);
              endif;
              echo $__env->renderComponent();
            endif;
            ?>
          @endif
        </div>
      @endforeach
    </div>
  </div>
</div>
<style>
    #multiLangLayout3 .dropdown {
        display: flex;
    }
    #multiLangLayout3 .dropdown-menu {
        box-shadow: rgba(0, 0, 0, 0.09) 0px 24px 46px, rgba(0, 0, 0, 0.28) 0px 3px 10px;
        border: 0;
        top: 26px !important;
        border-radius: 7px;
    }
    #multiLangLayout3 .dropdown-menu:before {
        content: " ";
        position: absolute;
        background: white;
        clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        height: 12px;
        width: 22px;
        right: 12px;
        top: -11px;
    }
    #multiLangLayout3 .dropdown-menu .item-dropdown {
        border-bottom: 0.1px solid #0000004d;
        display: flex;
    &:hover, &:focus {
                  color: var(--primary);
              }
    }
    #multiLangLayout3 .dropdown-menu .item-dropdown:last-child {
        border-bottom: 0;
    }

</style>
<script defer type="text/javascript">
  $(document).ready(function () {
    $("#{{$component->idButton}}").attr('data-toggle', 'dropdown');
  })
</script>
