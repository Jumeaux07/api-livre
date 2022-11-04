@extends('admin.partials.index')
@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="row">
            <!-- column -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">UTILISATEURS</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-info"><i class="mdi mdi-account"></i></span>
                            <a href="javscript:void(0)" class="link display-5 ms-auto">23</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LIVRES</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-purple"><i class="mdi mdi-book-open-page-variant"></i></span>
                            <a href="javscript:void(0)" class="link display-5 ms-auto">169</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">MATIERES</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-primary"><i class="mdi mdi-book-multiple"></i></span>
                            <a href="javscript:void(0)" class="link display-5 ms-auto">311</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">LIVRES SCANES</h5>
                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                            <span class="display-5 text-success"><i class="mdi mdi-qrcode-scan"></i></span>
                            <a href="javscript:void(0)" class="link display-5 ms-auto">117</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- column -->
        </div>
    </div>
    <div class="col-lg-6">
        <div class="news-slide m-b-15">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="active carousel-item" style="height: 350px;">
                        <div class="overlaybg"><img src="../assets/images/news/slide1.jpg" height="350px" /></div>
                        <div class="news-content carousel-caption"><span class="label label-danger label-rounded">Primary</span>
                            <h4>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4> <a href="javascript:void(0)">Read More</a></div>
                    </div>
                    <div class="carousel-item" style="height: 350px;">
                        <div class="overlaybg"><img src="../assets/images/news/slide1.jpg" height="350px" /></div>
                        <div class="news-content carousel-caption"><span class="label label-primary label-rounded">Primary</span>
                            <h4>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4> <a href="javascript:void(0)">Read More</a></div>
                    </div>
                    <div class="carousel-item" style="height: 350px;">
                        <div class="overlaybg"><img src="../assets/images/news/slide1.jpg" height="350px" /></div>
                        <div class="news-content carousel-caption"><span class="label label-success label-rounded">Primary</span>
                            <h4>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4> <a href="javascript:void(0)">Read More</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="table-responsive m-t-40">
        <table id="example23"
            class="display nowrap table table-hover table-striped border"
            cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011/07/25</td>
                    <td>$170,750</td>
                </tr>

                <tr>
                    <td>Howard Hatfield</td>
                    <td>Office Manager</td>
                    <td>San Francisco</td>
                    <td>51</td>
                    <td>2008/12/16</td>
                    <td>$164,500</td>
                </tr>
                <tr>
                    <td>Hope Fuentes</td>
                    <td>Secretary</td>
                    <td>San Francisco</td>
                    <td>41</td>
                    <td>2010/02/12</td>
                    <td>$109,850</td>
                </tr>
                <tr>
                    <td>Vivian Harrell</td>
                    <td>Financial Controller</td>
                    <td>San Francisco</td>
                    <td>62</td>
                    <td>2009/02/14</td>
                    <td>$452,500</td>
                </tr>
                <tr>
                    <td>Timothy Mooney</td>
                    <td>Office Manager</td>
                    <td>London</td>
                    <td>37</td>
                    <td>2008/12/11</td>
                    <td>$136,200</td>
                </tr>
                <tr>
                    <td>Jackson Bradshaw</td>
                    <td>Director</td>
                    <td>New York</td>
                    <td>65</td>
                    <td>2008/09/26</td>
                    <td>$645,750</td>
                </tr>
                <tr>
                    <td>Olivia Liang</td>
                    <td>Support Engineer</td>
                    <td>Singapore</td>
                    <td>64</td>
                    <td>2011/02/03</td>
                    <td>$234,500</td>
                </tr>
                <tr>
                    <td>Bruno Nash</td>
                    <td>Software Engineer</td>
                    <td>London</td>
                    <td>38</td>
                    <td>2011/05/03</td>
                    <td>$163,500</td>
                </tr>
                <tr>
                    <td>Sakura Yamamoto</td>
                    <td>Support Engineer</td>
                    <td>Tokyo</td>
                    <td>37</td>
                    <td>2009/08/19</td>
                    <td>$139,575</td>
                </tr>
                <tr>
                    <td>Thor Walton</td>
                    <td>Developer</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2013/08/11</td>
                    <td>$98,540</td>
                </tr>
                <tr>
                    <td>Finn Camacho</td>
                    <td>Support Engineer</td>
                    <td>San Francisco</td>
                    <td>47</td>
                    <td>2009/07/07</td>
                    <td>$87,500</td>
                </tr>
                <tr>
                    <td>Serge Baldwin</td>
                    <td>Data Coordinator</td>
                    <td>Singapore</td>
                    <td>64</td>
                    <td>2012/04/09</td>
                    <td>$138,575</td>
                </tr>
                <tr>
                    <td>Zenaida Frank</td>
                    <td>Software Engineer</td>
                    <td>New York</td>
                    <td>63</td>
                    <td>2010/01/04</td>
                    <td>$125,250</td>
                </tr>
                <tr>
                    <td>Zorita Serrano</td>
                    <td>Software Engineer</td>
                    <td>San Francisco</td>
                    <td>56</td>
                    <td>2012/06/01</td>
                    <td>$115,000</td>
                </tr>
                <tr>
                    <td>Jennifer Acosta</td>
                    <td>Junior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>43</td>
                    <td>2013/02/01</td>
                    <td>$75,650</td>
                </tr>
                <tr>
                    <td>Cara Stevens</td>
                    <td>Sales Assistant</td>
                    <td>New York</td>
                    <td>46</td>
                    <td>2011/12/06</td>
                    <td>$145,600</td>
                </tr>
                <tr>
                    <td>Hermione Butler</td>
                    <td>Regional Director</td>
                    <td>London</td>
                    <td>47</td>
                    <td>2011/03/21</td>
                    <td>$356,250</td>
                </tr>
                <tr>
                    <td>Lael Greer</td>
                    <td>Systems Administrator</td>
                    <td>London</td>
                    <td>21</td>
                    <td>2009/02/27</td>
                    <td>$103,500</td>
                </tr>
                <tr>
                    <td>Jonas Alexander</td>
                    <td>Developer</td>
                    <td>San Francisco</td>
                    <td>30</td>
                    <td>2010/07/14</td>
                    <td>$86,500</td>
                </tr>
                <tr>
                    <td>Shad Decker</td>
                    <td>Regional Director</td>
                    <td>Edinburgh</td>
                    <td>51</td>
                    <td>2008/11/13</td>
                    <td>$183,000</td>
                </tr>
                <tr>
                    <td>Michael Bruce</td>
                    <td>Javascript Developer</td>
                    <td>Singapore</td>
                    <td>29</td>
                    <td>2011/06/27</td>
                    <td>$183,000</td>
                </tr>
                <tr>
                    <td>Donna Snider</td>
                    <td>Customer Support</td>
                    <td>New York</td>
                    <td>27</td>
                    <td>2011/01/25</td>
                    <td>$112,000</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
