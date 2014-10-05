<!-- greater than '>' &gt; -->
<!-- less than '<' &lt; -->
<div class="line1">1  |// Class Sapmle Program 3</div>
<div class="line2">2  |// Filename: Class3.cpp#include&lt;stdio.h&gt;</div>
<div class="line3">3  |#include &lt;iostream&gt;</div>
<div class="line4">4  |#include &lt;string&gt;</div>
<div class="line4">4  |</div>
<div class="line5">5  |using namespace std;</div>
<div class="line6">6  |</div>
<div class="line7">7  |class Student{</div>
<div class="line8">8  |	private:</div>
<div class="line9">9  |		string name;</div>
<div class="line10">10 |		int units_enrolled; </div>
<div class="line11">11 |		double rate_per_unit; </div>
<div class="line12">12 |	</div>
<div class="line13">13 |	public:</div>
<div class="line14">14 |		
<div class="line15">15 |		Student(); </div>
<div class="line16">16 |		Student(string);</div>	
<div class="line17">17 |			Student(string,int);</div>
<div class="line18">18 |			Student(string,int,double);</div>
<div class="line19">19 |			string get_name();</div>
<div class="line20">20 |			double compute_tfee();</div>
<div class="line21">21 |	};</div>
<div class="line22">22 |	</div>
<div class="line23">23 |	Student::Student(){</div>
<div class="line24">24 |		name = "Emily Sicat";</div>
<div class="line25">25 |		units_enrolled = 10;</div>
<div class="line26">26 |		rate_per_unit = 125.00;</div>
<div class="line27">27 |	}</div>
<div class="line28">28 |	</div>
<div class="line29">29 |	Student::Student(string n){</div>
<div class="line30">30 |		name = n;</div>
<div class="line31">31 |			units_enrolled = 15;</div>
<div class="line32">32 |		rate_per_unit = 100.00;</div>
<div class="line33">33 |	}</div>
<div class="line34">34 |	</div>
<div class="line35">35 |	Student::Student(string n, int unit){</div>
<div class="line36">36 |		name = n;</div>
<div class="line37">37 |			units_enrolled = unit;</div>
<div class="line38">38 |		rate_per_unit = 130.00;</div>
<div class="line39">39 |}</div>
<div class="line40">40 |	</div>
<div class="line41">41 |	Student::Student(string n, int unit, double rate){</div>
<div class="line42">42 |		name = n;</div>
<div class="line43">43 |			units_enrolled = unit;</div>
<div class="line44">44 |		rate_per_unit = rate;</div>
<div class="line45">45 |	}</div>
<div class="line46">56 |	</div>
<div class="line47">47 |	</div>
<div class="line48">48 |	string Student::get_name(){ </div>
<div class="line49">49 |	</div>
<div class="line50">50 |	</div>
<div class="line51">51 |		return name;</div>
<div class="line52">52 |	</div>
<div class="line53">53 |	</div>
<div class="line54">54 |	}</div>
<div class="line55">55 |	</div>
<div class="line56">56 |	double Student::compute_tfee() {</div>
<div class="line57">57 |	</div>
<div class="line58">62 |	</div>
<div class="line59">59 |		return units_enrolled * rate_per_unit; </div>
<div class="line60">60 |	</div>
<div class="line61">61 |	</div>
<div class="line62">62 |	}</div>
<div class="line63">63 |	</div>
<div class="line64">64 |	int main()</div>
<div class="line65">65 |	{</div>
<div class="line66">66 |	</div>
<div class="line67">67 |		Student studRec1;</div>
<div class="line68">68 |		Student studRec2("Lance Sicat",10, 250.00); </div>
<div class="line69">69 |		Student studRec3("Iya Sicat");</div>
<div class="line70">70 |		</div>
<div class="line71">71 |		cout &lt;&lt;endl;</div>
<div class="line72">72 |		cout &lt;&lt;"Information of StudRec1 object : "&lt;&lt;endl;</div>
<div class="line73">73 |		cout &lt;&lt;"Name : " &lt;&lt;studRec1.get_name() &lt;&lt;endl;</div>
<div class="line74">74 |			cout &lt;&lt;"Your total tuition fee to be paid : "&lt;&lt;studRec1.compute_tfee()&lt;&lt;ndl;</div>
<div class="line75">75 |			</div>
<div class="line76">76 |			cout &lt;&lt;endl;</div>
<div class="line77">77 |			cout &lt;&lt;"Information of StudRec2 object : "&lt;&lt;endl;</div>
<div class="line78">78 |			cout &lt;&lt;"Name : " &lt;&lt;studRec2.get_name() &lt;&lt;endl;</div>
<div class="line79">79 |			cout &lt;&lt;"Your total tuition fee to be paid : "&lt;&lt;studRec2.compute_tfee()&lt;&lt;ndl;</div>
<div class="line80">80 |			</div>
<div class="line81">81 |			cout &lt;&lt;endl;</div>
<div class="line82">82 |			cout &lt;&lt;"Information of StudRec3 object : "&lt;&lt;endl;</div>
<div class="line83">83 |		cout &lt;&lt;"Name : " &lt;&lt;studRec3.get_name() &lt;&lt;endl;</div>
<div class="line84">84 |		cout &lt;&lt;"Your total tuition fee to be paid : "&lt;&lt;studRec3.compute_tfee()&lt;&lt;ndl; </div>
<div class="line85">85 |	return 0;</div>|
<div class="line86">86 |}</div>
