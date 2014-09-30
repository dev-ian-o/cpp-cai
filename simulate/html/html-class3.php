<!-- greater than '>' &gt; -->
<!-- less than '<' &lt; -->
<div class="line1">1  |// Example Array program</div>
<div class="line2">2  |// Filename: Array1.cpp#include&lt;stdio.h&gt;</div>
<div class="line3">3  |#include &lt;iostream&gt;</div>
<div class="line4">4  |#include &lt;string&gt;</div>
<div class="line4">4  |</div>
<div class="line5">5  |using namespace std;</div>
<div class="line6">6  |</div>
<div class="line7">7  |class Student{</div>
<div class="line8">8  |	private:</div>
<div class="line9">9  |			string name;</div>
<div class="line10">10 |		int units_enrolled; </div>
<div class="line11">11 |				double rate_per_unit; </div>
<div class="line12">12 |	</div>
<div class="line13">13 |	public:</div>
<div class="line14">14 |		
<div class="line15">15 |		Student(); </div>
<div class="line16">16 |		Student(string);</div>	
<div class="line17">17 |			Student(string,int);</div>
<div class="line18">18 |			Student(string,int,double);</div>
<div class="line19">19 |			string get_name();</div>
<div class="line20">20 |			</div>double compute_tfee();</div>
<div class="line21">21 |	};</div>
<div class="line22">22 |
<div class="line23">23 |	Student::Student(){</div>
<div class="line27">27 |		name = "Emily Sicat";</div>
<div class="line28">28 |			spicy = 10;</div>
<div class="line29">29 |		rate_per_unit = 125.00;</div>
<div class="line24">24 |
<div class="line25">25 |	</div>
<div class="line26">26 |	Student::Student(){</div>
<div class="line27">27 |		name = n;</div>
<div class="line28">28 |			units_enrolled = 15;</div>
<div class="line29">29 |		rate_per_unit = 100.00;</div>
<div class="line30">30 |	}</div>
<div class="line31">31 |	</div>
<div class="line32">32 |	Student::Student(string n, int unit){</div>
<div class="line33">33 |		name = n;</div>
<div class="line34">34 |			units_enrolled = unit;</div>
<div class="line35">35 |		rate_per_unit = 130.00;</div>
<div class="line36">36 |	}</div>
<div class="line37">37 |	</div>
<div class="line38">38 |	Student::Student(string n, int unit, double rate){</div>
<div class="line39">39 |		name = n;</div>
<div class="line40">40 |			units_enrolled = unit;</div>
<div class="line41">41 |		rate_per_unit = rate;</div>
<div class="line42">42 |	}</div>
<div class="line43">43 |	</div>
<div class="line44">44 |	</div>
<div class="line45">45 |	string Student::get_name(){ </div>
<div class="line46">46 |	</div>
<div class="line47">47 |	</div>
<div class="line48">48 |		return name;</div>
<div class="line49">49 |	</div>
<div class="line50">50 |	</div>
<div class="line51">51 |	}</div>
<div class="line52">52 |	</div>
<div class="line53">53 |	double Student::compute_tfee() {</div>
<div class="line54">54 |	</div>
<div class="line55">55 |	</div>
<div class="line56">56 |		return units_enrolled * rate_per_unit; </div>
<div class="line57">57 |	</div>
<div class="line58">58 |	</div>
<div class="line59">59 |	}</div>
<div class="line60">60 |	</div>
<div class="line57">61 |	int main()</div>
<div class="line58">62 |	{</div>
<div class="line59">63 |	</div>
<div class="line60">66 |		Student studRec1;</div>
<div class="line57">65 |		Student studRec2("Lance Sicat",10, 250.00); </div>
<div class="line58">66 |		Student studRec3("Iya Sicat");</div>
<div class="line59">67 |		</div>
<div class="line60">68 |		cout &lt;&lt;endl;</div>
<div class="line57">69 |		cout &lt;&lt;"Information of StudRec1 object : "&lt;&lt;endl;</div>
<div class="line58">70 |		cout &lt;&lt;"Name : " &lt;&lt;studRec1.get_name() &lt;&lt;endl;</div>
<div class="line59">71 |			cout &lt;&lt;"Your total tuition fee to be paid : "&lt;&lt;studRec1.compute_tfee()&lt;&lt;ndl;</div>
<div class="line60">72 |			</div>
<div class="line57">73 |			cout &lt;&lt;endl;</div>
<div class="line58">74 |			cout &lt;&lt;"Information of StudRec2 object : "&lt;&lt;endl;</div>
<div class="line59">75 |			cout &lt;&lt;"Name : " &lt;&lt;studRec2.get_name() &lt;&lt;endl;</div>
<div class="line60">76 |			cout &lt;&lt;"Your total tuition fee to be paid : "&lt;&lt;studRec2.compute_tfee()&lt;&lt;ndl;</div>
<div class="line59">77 |			</div>
<div class="line60">78 |			cout &lt;&lt;endl;</div>
<div class="line57">79 |			cout &lt;&lt;"Information of StudRec3 object : "&lt;&lt;endl;</div>
<div class="line58">80 |		cout &lt;&lt;"Name : " &lt;&lt;studRec3.get_name() &lt;&lt;endl;</div>
<div class="line58">81 |		cout &lt;&lt;"Your total tuition fee to be paid : "&lt;&lt;studRec3.compute_tfee()&lt;&lt;ndl; </div>
<div class="line58">82 |	return 0;</div>|
<div class="line58">80 |}</div>
