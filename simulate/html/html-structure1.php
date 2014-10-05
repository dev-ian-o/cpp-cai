<!-- greater than '>' &gt; -->
<!-- less than '<' &lt; -->
<div class="line1">1  |// Structure Program Sample 1</div>
<div class="line2">2  |// Filename: Structure Program.cpp#include&lt;stdio.h&gt;</div>
<div class="line3">3  |#include &lt;iostream&gt;</div>
<div class="line4">4  |#include &lt;string&gt;<string></div>
<div class="line5">5  |</div>
<div class="line6">6  |using namespace std;</div>
<div class="line7">7  |</div>
<div class="line8">8  |struct PART_STRUCT</div>
<div class="line9">9  |{</div>
<div class="line10">10 |	string   part_no; </div>
<div class="line11">11 |	int quantity_on_hand;</div>
<div class="line12">12 |	double unit_price;</div>
<div class="line13">13 |} keyboard;</div>
<div class="line14">14 |</div>
<div class="line15">15 |int main()</div>
<div class="line16">16 |{</div>
<div class="line17">17 |	PART_STRUCT mouse;</div>
<div class="line18">18 |	</div>
<div class="line19">19 |	keyboard.part_no = "KB12345"; </div>
<div class="line20">20 |	keyboard.quantity_on_hand = 10	;</div>
<div class="line21">21 |	keyboard.unit_price =1499.75;</div>
<div class="line22">22 |	cout << "Enter the seven-character part number: ";</div>
<div class="line23">23 |	getline(cin, mouse.part_no);</div>
<div class="line24">24 |	</div>
<div class="line25">25 |	cout << endl;</div>
<div class="line26">26 |	cout << "Enter the quantity on hand: ";</div>
<div class="line27">27 |	cin >> mouse.quantity_on_hand;</div>
<div class="line28">28 |	</div>
<div class="line29">29 |	</div>
<div class="line30">30 |	cout << endl;</div>
<div class="line31">31 |	cout << "Enter the unit price: ";</div>
<div class="line32">32 |	cin >> mouse.unit_price;</div>
<div class="line33">33 |	</div>
<div class="line34">34 |	cout << endl;</div>
<div class="line35">35 |	cout << "You entered the following information for the variable mouse of data type PART_STRUCT:" << endl << endl;</div>
<div class="line36">36 |	</div>
<div class="line37">37 |	cout << "Part Number:      " << mouse.part_no << endl;</div>
<div class="line38">38 |	cout << "Quantity On Hand: " << mouse.quantity_on_hand << endl;</div>
<div class="line39">39 |	cout << "Unit Price:       " << mouse.unit_price << endl; </div>
<div class="line40">40 |	cout << endl;</div>
<div class="line41">41 |	</div>
<div class="line42">42 |	cout << "You assigned the following information for the variable keyboard of data type PART_STRUCT:" << endl << endl;  </div>
<div class="line43">43 |	cout << "Part Number:      " << keyboard.part_no << endl;  </div>
<div class="line44">44 |	cout << "Quantity On Hand: " << keyboard.quantity_on_hand << endl; </div>
<div class="line45">45 |	cout << "Unit Price:       " << keyboard.unit_price << endl;</div>
<div class="line46">46 |	return 0;</div>
<div class="line47">47 |}</div>