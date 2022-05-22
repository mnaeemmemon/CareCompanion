@extends('layouts.pharmacymain')
@section('main-container')

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="p-4 bg-white rounded" style="    width: 111%;">

				<div class="row g-3 mb-4 align-items-center justify-content-between">
					<div class="col-auto">
						<h1 class="app-page-title mb-0">Category List</h1>
					</div>
					<div class="table-responsive">
						<table class="table table-hover">
							<thead class="thead-light">
								<tr>
									<th>Id</th>
									<th scope="col">Name</th>
									{{-- <th scope="col">Product Type</th>
									<th scope="col">Manufacturer</th>
									<th scope="col">Manufacturing Date</th>
									<th scope="col">Expiry Date</th>
									<th scope="col">Formula</th>
									<th scope="col">Gram</th>
									<th scope="col">Side Effects</th>

									<th scope="col">Price</th>
									<th scope="col">Image</th>
									<th scope="col">Prescription Needed</th> --}}

									<th>Action</th>
								</tr>
							</thead>
							<tbody>

								@foreach($cats as $cat)
								<tr>
									<td>{{$cat->id}}</td>
									<td>{{$cat->name}}</td>
									{{-- <td>{{$product->type->Name}}</td>
									<td>{{$product->Manufacture}}</td>
									<td>{{$product->Manufacturing_date}}</td>
									<td>{{$product->Expiry_date}}</td>
									<td>{{$product->Formula}}</td>
									<td>{{$product->gram}}</td>
									<td>{{$product->SideEffects}}</td>
									<td>{{$product->Price}}</td>
									<td><img src="{{asset('images/product_images/'.$product->image.'')}}"
											style="width: 5em;"></td>

		

									@if($product->prescription_needed == 1)
									<td>Yes</td>
									@else
									<td>No</td>
									@endif --}}

									<td>

										{{-- <a href="{{ url('var_update',$key->id) }}">
											<i class="far fa-plus-square"></i>
										</a> --}}
										<a href="{{ url('pharmacyupdateCategory',$cat->id) }}">
											{{-- <i class="far fa-plus-square"></i> --}}
											<img src="{{asset('img/core-img/upd.jpg')}}" style="width: 26px;" alt="">
										</a>

										<a href="{{ url('pharmacyDeleteCategory',$cat->id) }}">
											<img src="{{asset('img/core-img/del3.jpg')}}" style="width: 26px;" alt="">
										</a>
									</td>
								</tr>




								@endforeach




								{{-- <tr>
									<td>3</td>
									<td>Ibuprofen</td>
									<td>Homeopathic</td>
									<td>NSAID</td>
									<td>2021-08-18</td>
									<td>2022-06-09</td>
									<td>PEG 6000
										Carbopol
										Ethyl Cellulose
										Lactose
										Talc
										Magnesium Stearate</td>
									<td>200</td>
									<td>changes in your vision;
										shortness of breath (even with mild exertion);
										swelling or rapid weight gain;
										a skin rash, no matter how mild;
										signs of stomach bleeding - bloody or tarry stools, coughing up blood or vomit
										that looks like coffee grounds;
										liver problems - nausea, upper stomach pain, itching, tired feeling, flu-like
										symptoms, loss of appetite, dark urine, clay-colored stools, jaundice (yellowing
										of the skin or eyes);
										low red blood cells (anemia) - pale skin, feeling light-headed</td>
									<td>100</td>

									<td><img src="../assets/images/Downloads/ibu-200-2x10-500x500.jpg"
											style="width: 5em;"></td>
									<td>No</td>
								</tr>
								<tr>
									<td>4</td>
									<td>Metformin</td>
									<td>Homeopathic</td>
									<td>Duchefa Farma B.V.</td>
									<td>2021-03-16</td>
									<td>2023-02-25</td>
									<td>C4H11N5 • HCl</td>
									<td>500</td>
									<td>feeling sick (nausea)
										being sick (vomiting) or diarrhoea
										stomach ache
										loss of appetite
										a metallic taste in the mouth</td>
									<td>500</td>
									<td><img src="../assets/images/Downloads/Metformin.jpg" style="width: 5em;"></td>
									<td>No</td>
								</tr>
								<tr>
									<td>5</td>
									<td>Crocin</td>
									<td>Stomach Ache</td>
									<td>GLAXOSMITHKLINE PHAR</td>
									<td>2021-06-17</td>
									<td>2023-08-18</td>
									<td>Paracetamol IP : 650mg
										Caffeine Anhydrous IP : 50 mg</td>
									<td>1000</td>
									<td>Most of the side effects of Crocin Pain Relief Tablet 15's do not require
										medical attention and gradually resolve over time. However, if the side effects
										are persistent, reach out to a doctor. Some common side effects of Crocin Pain
										Relief Tablet 15's are increased heart rate, insomnia, restlessness, and
										irritation, etc. Some may experience allergic skin reactions such as peeling and
										blistering of the skin. Inform your doctor if you are allergic to caffeine,
										paracetamol, or any other ingredients</td>
									<td>120</td>
									<td><img src="../assets/images/Downloads/crocin-pain-.jpg" style="width: 5em;"></td>
									<td>No</td>
								</tr>
								<tr>
									<td>6</td>
									<td>Cal-D Tablets</td>
									<td>Homeopathic</td>
									<td>Mascot International</td>
									<td>2021-10-13</td>
									<td>2022-06-18</td>
									<td>Calcium 600mg,vitamin D 400 IU</td>
									<td>1000</td>
									<td>Most of the side effects of Crocin Pain Relief Tablet 15's do not require
										medical attention and gradually resolve over time. However, if the side effects
										are persistent, reach out to a doctor. Some common side effects of Crocin Pain
										Relief Tablet 15's are increased heart rate, insomnia, restlessness, and
										irritation, etc. Some may experience allergic skin reactions such as peeling and
										blistering of the skin. Inform your doctor if you are allergic to caffeine,
										paracetamol, or any other ingredients</td>
									<td>300</td>
									<td><img src="../assets/images/Downloads/Cal-D.jpg" style="width: 5em;"></td>
									<td>No</td>
								</tr>
								<tr>
									<td>7</td>
									<td>RISEK CAP 40 MG 14'S</td>
									<td>Headache</td>
									<td> Getz Pharma Pakistan (Pvt) Ltd.</td>
									<td>2021-07-22</td>
									<td>2022-06-24</td>
									<td>Omeprazole is 5-methoxy-2-[[(4-methoxy-3, 5-dimethyl-2-pyridinyl) methyl]
										sulfinyl]-1H-benzimidazole.C17H19N3O3S.</td>
									<td>40</td>
									<td>Headache or abdominal pain may occur</td>
									<td>210</td>
									<td><img src="../assets/images/Downloads/Risek.jpg" style="width: 5em;"></td>
									<td>No</td>
								</tr>
								<tr>
									<td>8</td>
									<td>Hashmi Joshanda</td>
									<td>Diabetes Medicine</td>
									<td>Hashmi</td>
									<td>2021-10-20</td>
									<td>2023-05-20</td>
									<td>Homeopathic</td>
									<td>15</td>
									<td>Might feel dizzy.</td>
									<td>10</td>
									<td><img src="../assets/images/Downloads/Hashmi Joshanda.jpg" style="width: 5em;">
									</td>
									<td>No</td>
								</tr>
								<tr>
									<td>9</td>
									<td>Flagyl Tablets 400mg 20X10's</td>
									<td>Homeopathic</td>
									<td>Sanofi-Aventis Pakistan Ltd.</td>
									<td>2021-12-12</td>
									<td>2023-02-25</td>
									<td>Metronidazole</td>
									<td>400</td>
									<td>It can cause agitation, back pain, blindness, dizziness, irritability, lack of
										co-ordination.</td>
									<td>25</td>
									<td><img src="../assets/images/Downloads/Flagyl.jpg" style="width: 5em;"></td>
									<td>No</td>
								</tr> --}}
							</tbody>
						</table>

					</div>
				</div>


			</div>
			<!--//row-->














		</div>
		<!--//container-fluid-->
	</div>
	<!--//app-content-->
</div>





</div>
<!--//app-wrapper-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<!-- Javascript -->
<script src="../assets/plugins/popper.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Page Specific JS -->
<script src="../assets/js/app.js"></script>

</body>

</html>

@endsection