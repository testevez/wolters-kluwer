function addFormatValidation(n,t,i,r){return t||(n.add(Validate.Format,i),n.add(Validate.Length,r),t=!0),t}function removeFormatValidation(n,t,i,r){return t&&(n.remove(Validate.Format,i),n.remove(Validate.Length,r),t=!1),t}function setPhoneNumberValidation(n,t){var i={pattern:/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}\s?[x,x.,ext,ext.,extension]?\d{0,5}$/,failureMessage:t},r={minimum:10};jQuery(function(){var t=!1;jQuery("#field_C_State_Prov").change(function(){var f=jQuery(this.parentElement).find(".select2-chosen").text(),e=$("#s2id_field_C_State_Prov").parent(),u=e.find("option[value='"+f+"']").attr("country");(u==="Canada"||u==="United States")&&(t=addFormatValidation(n,t,i,r));(u===""||u===undefined)&&(t=removeFormatValidation(n,t,i,r))})})}