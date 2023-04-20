<?php
use App\Http\Controllers\Controller;
$mainCategories = Controller::mainCategories();
?>
<div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <!--  -->
                            @if(!$mainCategories->isEmpty())
                            @foreach($mainCategories as $cat)
                            @if($cat->status=='1')
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
        <a class="list-group-item list-group-item-action" onclick="event.preventDefault();
                                                     document.getElementById('cat-form{{$cat->id}}').submit();" href="#sub-menu{{$cat->id}}" data-toggle="collapse" aria-expanded="true" aria-controls="sub-menu{{$cat->id}}">{{$cat->name}} <small class="text-muted">({{$total_products_of_parent[$loop->index] ?? '0'}})</small>
                                    </a>

                                    <form id="cat-form{{$cat->id}}" action="{{route('product.search_about_category',$cat->slug)}}" style="display: none;">
                                       
                                    </form>

                                    @if(!$cat->child_categories->isEmpty())
                                       <div class="collapse show" id="sub-menu{{$cat->id}}" data-parent="#list-group-men">
                                        <div class="list-group">
                                            @foreach($cat->child_categories as $child_cat)
                                            @if($child_cat->status=='1')
                                    <a href="{{route('product.search_about_category',$child_cat->slug)}}" class="list-group-item list-group-item-action active">{{$child_cat->name}} <small class="text-muted">({{$child_cat->products->count()}})</small></a>
                                    @endif
                                            @endforeach                                           
                                        </div>
                                    </div> 
                                     @endif
                                </div>
                            </div>
                            @endif
                             @endforeach
                            <!--  -->
                            @endif
                        </div>