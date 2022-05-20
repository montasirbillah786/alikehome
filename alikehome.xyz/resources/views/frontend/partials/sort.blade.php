                          

                            <div class="widget_list widget_color">
                                <h3>Select Institute</h3>
                                <ul>
                                    @foreach(App\Brand::orderby('name','desc')->limit(5)->get() as $parent)
                                    <li>
                                        <a href="{{route('brand.shot',$parent->id)}}">{{$parent->name}}  </a>
                                    </li>
                                    @endforeach


                                </ul>
                            </div>

                                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">

                            <div class="widget_list widget_filter">
                                <h3>Filter by price</h3>
                                <form method="post" action="{{ route('price.search') }}" enctype="multipart/form-data">

                          @csrf
                                      <div data-role="rangeslider">
                                        <label for="price-min">Price:</label>
                                        <input type="range" name="price1" id="myRange" value="200" min="0" max="1000">
                                        <p>Value: <span id="demo"></span></p>
                                        <br>
                                        <label for="price-max">Price:</label>
                                        <input type="range" name="price2" id="myRange1" value="800" min="0" max="10000">
                                        <p>Value: <span id="demo1"></span></p>

                                          <script type="text/javascript">

                                        var slider = document.getElementById("myRange");
                                        var output = document.getElementById("demo");
                                        var slider1 = document.getElementById("myRange1");
                                        var output1 = document.getElementById("demo1");
                                            output.innerHTML = slider.value;
                                           output1.innerHTML = slider1.value;
                                            slider.oninput = function() {
                                              output.innerHTML = this.value;

                                            }
                                            slider1.oninput = function() {
                                              output1.innerHTML = this.value;

                                              }

        </script>
      </div>
        <button type="submit">Filter</button>

      </form>
     </div>


                            <div class="widget_list banner_widget">
                                @include('frontend.partials.image')
                            </div>
                        </div>
                    </aside>

                    <!--sidebar widget end-->
