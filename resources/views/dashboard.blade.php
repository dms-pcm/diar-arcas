@extends('layout.app') @section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body">
      <div class="row d-none" id="three-card">
        <div class="col-xl-4 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media">
                  <div class="media-body text-left">
                    <h1 class="success">80</h1>
                    <span>Total Pengajuan Izin Lainnya</span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="ft-award success font-large-2 float-right"></i>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media">
                  <div class="media-body text-left">
                    <h1 class="deep-orange">70</h1>
                    <span>Total Pengajuan Izin Sakit</span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="ft-package deep-orange font-large-2 float-right"></i>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <div class="media">
                  <div class="media-body text-left">
                    <h1 class="info">6</h1>
                    <span>Total Pengajuan Cuti</span>
                  </div>
                  <div class="media-right media-middle">
                    <i class="ft-users info font-large-2 float-right"></i>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="graph">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-body">
              <ul class="list-inline text-center mt-3">
                <li>
                  <h6>
                    <i class="ft-circle danger"></i> Page Views
                  </h6>
                </li>
                <li>
                  <h6>
                    <i class="ft-circle success pl-1"></i> Total Visit
                  </h6>
                </li>
                <li>
                  <h6>
                    <i class="ft-circle warning pl-1"></i> Unique Visitor
                  </h6>
                </li>
              </ul>
              <div class="chartjs">
                <canvas id="visitors-graph" height="275"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row d-none" id="tb-kehadiran">
        <div class="col-xl-12 col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Kehadiran Karyawan Per Hari</h3>
              <a class="heading-elements-toggle">
                <i class="fa fa-ellipsis-v font-medium-3"></i>
              </a>
              <div class="heading-elements">
                <ul class="list-inline mb-0">
                  <li>
                    <a data-action="collapse">
                      <i class="ft-minus"></i>
                    </a>
                  </li>
                  <li>
                    <a data-action="reload">
                      <i class="ft-rotate-cw"></i>
                    </a>
                  </li>
                  <li>
                    <a data-action="expand">
                      <i class="ft-maximize"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-content collapse show">
            <div class="card-body">
              
              <table class="table table-striped table-bordered zero-configuration">
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
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009/01/12</td>
                    <td>$86,000</td>
                  </tr>
                  <tr>
                    <td>Cedric Kelly</td>
                    <td>Senior Javascript Developer</td>
                    <td>Edinburgh</td>
                    <td>22</td>
                    <td>2012/03/29</td>
                    <td>$433,060</td>
                  </tr>
                  <tr>
                    <td>Airi Satou</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>33</td>
                    <td>2008/11/28</td>
                    <td>$162,700</td>
                  </tr>
                  <tr>
                    <td>Brielle Williamson</td>
                    <td>Integration Specialist</td>
                    <td>New York</td>
                    <td>61</td>
                    <td>2012/12/02</td>
                    <td>$372,000</td>
                  </tr>
                  <tr>
                    <td>Herrod Chandler</td>
                    <td>Sales Assistant</td>
                    <td>San Francisco</td>
                    <td>59</td>
                    <td>2012/08/06</td>
                    <td>$137,500</td>
                  </tr>
                  <tr>
                    <td>Rhona Davidson</td>
                    <td>Integration Specialist</td>
                    <td>Tokyo</td>
                    <td>55</td>
                    <td>2010/10/14</td>
                    <td>$327,900</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
 @endsection