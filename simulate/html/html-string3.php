<!-- greater than '>' &gt; -->
<!-- less than '<' &lt; -->
<div class="line1">1  |// String Program Sample 3</div>
<div class="line2">2  |//Filename: String3.cpp</div>
<div class="line3">3  |#include &lt;iostream&gt;</div>
<div class="line4">4  |#include &lt;string&gt;</div>
<div class="line5">5  |</div>
<div class="line6">6  |using namespace std;</div>
<div class="line7">7  |</div>
<div class="line8">8  |int main()</div>
<div class="line9">9  |{</div>
<div class="line10">10 |	string str1 = "This is an example string";</div>
<div class="line11">11 |	string str2 = "sample";</div>
<div class="line12">12 |	string str3;</div>
<div class="line13">13 |	string punctuation = ".,:;!?";</div>
<div class="line14">14 |	</div>
<div class="line15">15 |	int position;</div>
<div class="line16">16 |	</div><div class="block1">
<div class="line17">17 |	cout &lt;&lt; "The original string, str1, is : "</div>
<div class="line18">18 |		&lt;&lt; str1 &lt;&lt; endl &lt;&lt; endl;</div></div>
<div class="line19">19 |	</div>
<div class="line20">20 |	cout &lt;&lt;"The length of str is "&lt;&lt;str1.length() &lt;&lt;" characters."&lt;&lt;endl;</div>
<div class="line21">21 |	</div>
<div class="line22">22 |	if (str2.empty()) </div>
<div class="line23">23 |		cout&lt;&lt;"str2 is empty."&lt;&lt;endl;</div>
<div class="line24">24 |	else</div>
<div class="line25">25 |		cout &lt;&lt;"str2 is not empty. It has the value \""&lt;&lt;str2 &lt;&lt;"\""&lt;&lt;endl;</div>
<div class="line26">26 |	</div>
<div class="line27">27 |	str3 = str1.substr(11, 8);</div>
<div class="line28">28 |	</div><div class="block2">
<div class="line29">29 |	cout &lt;&lt; "The 8-charater substring of str1 beginning at position 11 is: "</div>
<div class="line30">30 |		&lt;&lt; str3 &lt;&lt; endl &lt;&lt; endl; </div></div>
<div class="line31">31 |		</div>
<div class="line32">32 |	str1.replace(11, 7, str2);</div>
<div class="line33">33 |	</div><div class="block3">
<div class="line34">34 |	cout &lt;&lt; "After REPLACING the word \"example\" " &lt;&lt; endl</div>
<div class="line35">35 |		&lt;&lt; "by the word \"sample\", in str1 the string is: "</div>
<div class="line36">36 |		&lt;&lt; str1 &lt;&lt; endl &lt;&lt; endl; </div></div>
<div class="line37">37 |	</div>
<div class="line38">38 |	position =     str1.find_first_of(punctuation);</div>
<div class="line39">39 |	</div><div class="block4">
<div class="line40">40 |	cout &lt;&lt; "The first punctuation mark in str1 is "</div>
<div class="line41">41 |		&lt;&lt; "at position " &lt;&lt; position &lt;&lt; endl &lt;&lt; endl;</div>
<div class="line42">42 |	</div></div>
<div class="line44">44 |	return 0;</div>
<div class="line43">43 |}</div>