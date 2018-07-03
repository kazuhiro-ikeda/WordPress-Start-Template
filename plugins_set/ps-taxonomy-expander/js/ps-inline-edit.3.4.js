(function(a){inlineEditPost={init:function(){var c=this,d=a("#inline-edit"),b=a("#bulk-edit");c.type=a("table.widefat").hasClass("pages")?"page":"post";c.what="#post-";d.keyup(function(f){if(f.which==27){return inlineEditPost.revert()}});b.keyup(function(f){if(f.which==27){return inlineEditPost.revert()}});a("a.cancel",d).click(function(){return inlineEditPost.revert()});a("a.save",d).click(function(){return inlineEditPost.save(this)});a("td",d).keydown(function(f){if(f.which==13){return inlineEditPost.save(this)}});a("a.cancel",b).click(function(){return inlineEditPost.revert()});a('#inline-edit .inline-edit-private input[value="private"]').click(function(){var e=a("input.inline-edit-password-input");if(a(this).prop("checked")){e.val("").prop("disabled",true)}else{e.prop("disabled",false)}});a("a.editinline").live("click",function(){inlineEditPost.edit(this);return false});a("#bulk-title-div").parents("fieldset").after(a("#inline-edit fieldset.inline-edit-categories").clone()).siblings("fieldset:last").prepend(a("#inline-edit label.inline-edit-tags").clone());a("span.catshow").click(function(){a(this).hide().next().show().parent().next().addClass("cat-hover")});a("span.cathide").click(function(){a(this).hide().prev().show().parent().next().removeClass("cat-hover")});a('select[name="_status"] option[value="future"]',b).remove();a("#doaction, #doaction2").click(function(f){var g=a(this).attr("id").substr(2);if(a('select[name="'+g+'"]').val()=="edit"){f.preventDefault();c.setBulk()}else{if(a("form#posts-filter tr.inline-editor").length>0){c.revert()}}});a("#post-query-submit").mousedown(function(f){c.revert();a('select[name^="action"]').val("-1")})},toggle:function(c){var b=this;a(b.what+b.getId(c)).css("display")=="none"?b.revert():b.edit(c)},setBulk:function(){var e="",d=this.type,b,f=true;this.revert();a("#bulk-edit td").attr("colspan",a(".widefat:first thead th:visible").length);a("table.widefat tbody").prepend(a("#bulk-edit"));a("#bulk-edit").addClass("inline-editor").show();a('tbody th.check-column input[type="checkbox"]').each(function(g){if(a(this).prop("checked")){f=false;var h=a(this).val(),c;c=a("#inline_"+h+" .post_title").text()||inlineEditL10n.notitle;e+='<div id="ttle'+h+'"><a id="_'+h+'" class="ntdelbutton" title="'+inlineEditL10n.ntdeltitle+'">X</a>'+c+"</div>"}});if(f){return this.revert()}a("#bulk-titles").html(e);a("#bulk-titles a").click(function(){var c=a(this).attr("id").substr(1);a('table.widefat input[value="'+c+'"]').prop("checked",false);a("#ttle"+c).remove()});if("post"==d){b="post_tag";a('tr.inline-editor textarea[name="tax_input['+b+']"]').suggest(ajaxurl+"?action=ajax-tag-search&tax="+b,{delay:500,minchars:2,multiple:true,multipleSep:inlineEditL10n.comma+" "})}a("html, body").animate({scrollTop:0},"fast")},edit:function(c){var n=this,j,e,g,i,h,m,l,d=true,o,b,k;n.revert();if(typeof(c)=="object"){c=n.getId(c)}j=["post_title","post_name","post_author","_status","jj","mm","aa","hh","mn","ss","post_password","post_format","menu_order"];if(n.type=="page"){j.push("post_parent","page_template")}e=a("#inline-edit").clone(true);a("td",e).attr("colspan",a(".widefat:first thead th:visible").length);if(a(n.what+c).hasClass("alternate")){a(e).addClass("alternate")}a(n.what+c).hide().after(e);g=a("#inline_"+c);if(!a(':input[name="post_author"] option[value="'+a(".post_author",g).text()+'"]',e).val()){a(':input[name="post_author"]',e).prepend('<option value="'+a(".post_author",g).text()+'">'+a("#"+n.type+"-"+c+" .author").text()+"</option>")}if(a(':input[name="post_author"] option',e).length==1){a("label.inline-edit-author",e).hide()}b=a(".post_format",g).text();a("option.unsupported",e).each(function(){var f=a(this);if(f.val()!=b){f.remove()}});for(k=0;k<j.length;k++){a(':input[name="'+j[k]+'"]',e).val(a("."+j[k],g).text())}if(a(".comment_status",g).text()=="open"){a('input[name="comment_status"]',e).prop("checked",true)}if(a(".ping_status",g).text()=="open"){a('input[name="ping_status"]',e).prop("checked",true)}if(a(".sticky",g).text()=="sticky"){a('input[name="sticky"]',e).prop("checked",true)}a(".post_category",g).each(function(){var f=a(this).text();if(f){taxname=a(this).attr("id").replace("_"+c,"");a("ul."+taxname+"-checklist :checkbox",e).val(f.split(","));a("ul."+taxname+"-checklist :radio",e).val(f.split(","))}});a(".tags_input",g).each(function(){var q=a(this).text(),r=a(this).attr("id").replace("_"+c,""),p=a("textarea.tax_input_"+r,e),f=inlineEditL10n.comma;if(q){if(","!==f){q=q.replace(/,/g,f)}p.val(q)}p.suggest(ajaxurl+"?action=ajax-tag-search&tax="+r,{delay:500,minchars:2,multiple:true,multipleSep:inlineEditL10n.comma+" "})});i=a("._status",g).text();if("future"!=i){a('select[name="_status"] option[value="future"]',e).remove()}if("private"==i){a('input[name="keep_private"]',e).prop("checked",true);a("input.inline-edit-password-input").val("").prop("disabled",true)}h=a('select[name="post_parent"] option[value="'+c+'"]',e);if(h.length>0){m=h[0].className.split("-")[1];l=h;while(d){l=l.next("option");if(l.length==0){break}o=l[0].className.split("-")[1];if(o<=m){d=false}else{l.remove();l=h}}h.remove()}a(e).attr("id","edit-"+c).addClass("inline-editor").show();a(".ptitle",e).focus();return false},save:function(e){var d,b,c=a(".post_status_page").val()||"";if(typeof(e)=="object"){e=this.getId(e)}a("table.widefat .inline-edit-save .waiting").show();d={action:"inline-save",post_type:typenow,post_ID:e,edit_date:"true",post_status:c};b=a("#edit-"+e+" :input").serialize();d=b+"&"+a.param(d);a.post(ajaxurl,d,function(f){a("table.widefat .inline-edit-save .waiting").hide();if(f){if(-1!=f.indexOf("<tr")){a(inlineEditPost.what+e).remove();a("#edit-"+e).before(f).remove();a(inlineEditPost.what+e).hide().fadeIn()}else{f=f.replace(/<.[^<>]*?>/g,"");a("#edit-"+e+" .inline-edit-save .error").html(f).show()}}else{a("#edit-"+e+" .inline-edit-save .error").html(inlineEditL10n.error).show()}},"html");return false},revert:function(){var b=a("table.widefat tr.inline-editor").attr("id");if(b){a("table.widefat .inline-edit-save .waiting").hide();if("bulk-edit"==b){a("table.widefat #bulk-edit").removeClass("inline-editor").hide();a("#bulk-titles").html("");a("#inlineedit").append(a("#bulk-edit"))}else{a("#"+b).remove();b=b.substr(b.lastIndexOf("-")+1);a(this.what+b).show()}}return false},getId:function(c){var d=a(c).closest("tr").attr("id"),b=d.split("-");return b[b.length-1]}};a(document).ready(function(){inlineEditPost.init()})})(jQuery);