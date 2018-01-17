@extends('frontend.layouts.master')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <h1 class="mt-4 mb-3">Blog Home Two
            <small>Subheading</small>
        </h1>
        <!-- Page Heading/Breadcrumbs -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active">Blog Home 2</li>
        </ol>
        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <!-- Preview Image -->
                <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
                <hr>
                <!-- Date/Time -->
                <p>Posted on January 1, 2017 at 12:00 PM</p>
                <hr>
                <!-- Post Content -->
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut,
                    error quam sapiente
                    nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus
                    inventore?</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos
                    iste
                    ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus,
                    voluptatibus.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis
                    unde eius
                    illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis.
                    Enim,
                    iure!
                </p>
                <blockquote class="blockquote">
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a
                        ante.</p>
                    <footer class="blockquote-footer">Someone famous in
                        <cite title="Source Title">Source Title</cite>
                    </footer>
                </blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas
                    placeat
                    totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem
                    obcaecati?</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo,
                    aliquam
                    tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae?
                    Qui, necessitatibus, est!</p>

                <hr>
                <!-- Comments Form -->
                <div class="card my-4">
                    <h5 class="card-header">Leave a Comment:</h5>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- Single Comment -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                        purus odio, vestibulum in
                        vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                        lacinia
                        congue felis in faucibus.
                    </div>
                </div>
                <!-- Comment with nested comments -->
                <div class="media mb-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                        purus odio, vestibulum in
                        vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                        lacinia
                        congue felis in faucibus.
                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in
                                vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <div class="media mt-4">
                            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                            <div class="media-body">
                                <h5 class="mt-0">Commenter Name</h5>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                sollicitudin. Cras purus odio, vestibulum in
                                vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla.
                                Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-sm-8 -->
            <div class="col-sm-4">
                <!-- Message Widget -->
                <div class="card my-4 mt-0">
                    <a href="#" class="none-decor ribbon">
                        <h5 class="card-header">
                            <i class="fa fa-bell-o" aria-hidden="true"></i>
                            Thông báo</h5>
                    </a>
                    <!-- thong bao trong thang -->
                    <div class="card-body overflow">
                        <p>
                            <a href="#">1. Lịch nghỉ tết
                                <span class="badge badge-danger">New</span>
                            </a>
                        </p>
                        <p>
                            <a href="#">2. Lịch trực đêm
                                <span class="badge badge-danger">New</span>
                            </a>
                        </p>
                        <p>
                            <a href="#">3. Ngày nghỉ trong tuần
                                <span class="badge badge-danger">New</span>
                            </a>
                        </p>
                        <p>
                            <a href="#">4. Triệu tập</a>
                        </p>
                        <p>
                            <a href="#">5. Triệu tập</a>
                        </p>
                        <p>
                            <a href="#">6. Triệu tập</a>
                        </p>
                        <p>
                            <a href="#">7. Triệu tập</a>
                        </p>
                        <p>
                            <a href="#">8. Triệu tập</a>
                        </p>
                    </div>
                </div>
                <!-- News docunents Widget -->
                <div class="card mb-4">
                    <a href="#" class="none-decor ribbon">
                        <h5 class="card-header">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                            Văn bản mới</h5>
                    </a>
                    <!-- van ban quan trong -->
                    <div class="card-body overflow">
                        <p>
                            <a href="#">1. TT-404/2008 Cách ghi điểm
                                <span class="badge badge-primary">New</span>
                            </a>
                        </p>
                        <p>
                            <a href="#">2. TT-404/2008 Cách ghi điểm
                                <span class="badge badge-primary">New</span>
                            </a>
                        </p>
                        <p>
                            <a href="#">3. TT-404/2008 Cách ghi điểm
                                <span class="badge badge-primary">New</span>
                            </a>
                        </p>
                        <p>
                            <a href="#">4. TT-404/2008 Cách ghi điểm</a>
                        </p>
                        <p>
                            <a href="#">5. TT-404/2008 Cách ghi điểm</a>
                        </p>
                        <p>
                            <a href="#">6. TT-404/2008 Cách ghi điểm</a>
                        </p>
                        <p>
                            <a href="#">7. TT-404/2008 Cách ghi điểm</a>
                        </p>
                        <p>
                            <a href="#">8. TT-404/2008 Cách ghi điểm</a>
                        </p>
                        <p>
                            <a href="#">9. TT-404/2008 Cách ghi điểm</a>
                        </p>
                        <p>
                            <a href="#">10. TT-404/2008 Cách ghi điểm</a>
                        </p>
                    </div>
                </div>
                <!-- Most View Widget -->
                <div class="card my-4">
                    <a href="" class="none-decor ribbon">
                        <h5 class="card-header">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            Tin đọc nhiều</h5>
                    </a>
                    <!-- top 10 -->
                    <div class="card-body">
                        <p>
                            <a href="#">1. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-danger">10</span>
                        </p>
                        <p>
                            <a href="#">2. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-danger">10</span>
                        </p>
                        <p>
                            <a href="#">3. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-danger">10</span>
                        </p>
                        <p>
                            <a href="#">4. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-warning">4</span>
                        </p>
                        <p>
                            <a href="#">5. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-warning">4</span>
                        </p>
                        <p>
                            <a href="#">6. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-warning">4</span>
                        </p>
                        <p>
                            <a href="#">7. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-light">3</span>
                        </p>
                        <p>
                            <a href="#">8. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-light">3</span>
                        </p>
                        <p>
                            <a href="#">9. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-light">3</span>
                        </p>
                        <p>
                            <a href="#">10. Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                            <span class="badge badge-light">3</span>
                        </p>
                    </div>
                </div>
                <!-- Image Widget -->
                <div class="card my-4">
                    <a href="#" class="none-decor ribbon">
                        <h5 class="card-header">
                            <i class="fa fa-camera" aria-hidden="true"></i>
                            Hình ảnh hoạt động</h5>
                    </a>
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <a href="#">
                                    <img class="img-fluid" src="img/128x128.svg" alt="">
                                    <p>Sinh hoat he...</p>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <a href="#">
                                    <img class="img-fluid" src="img/128x128.svg" alt="">
                                    <p>Sinh hoat he...</p>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <a href="#">
                                    <img class="img-fluid" src="img/128x128.svg" alt="">
                                    <p>Sinh hoat he...</p>
                                </a>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <a href="#">
                                    <img class="img-fluid" src="img/128x128.svg" alt="">
                                    <p>Sinh hoat he...</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Categories Widget -->
                <div class="card my-4">
                    <a href="" class="none-decor ribbon">
                        <h5 class="card-header">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                            Danh mục</h5>
                    </a>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-sm-4 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
@endsection