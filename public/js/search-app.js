var appSearch = {
  initialize: function(config){
    this.searchBox.addEventListener("focus", this._enableKeyUp.bind(this));
    this.searchBox.addEventListener("blur", this._disableKeyUp.bind(this));
    this.companyUrl          = config.company_url;
    this.studentUrl          = config.student_url;
    this.generalCompanyUrl   = config.general_company_url;
    this.opdUrl              = config.opd_url;
    this._token             = config.token;

    document.getElementById("search-input").addEventListener("submit", function(e){
      e.preventDefault();
    });
  },


  searchBox          : document.querySelector("input[name='searchBox']"),



  _enableKeyUp : function(e){
    window.addEventListener("keyup", this._search.bind(this));
  },

  _disableKeyUp : function(e){
    window.removeEventListener("keyup", this._search);
  },

  _clickOption: function(){

  },

  _renderOptions: function(d){
    document.getElementById("List").innerHTML = "";

    for (var i = 0; i < d.length; i++) {
      //Company name
      var a = document.createElement("A");
      a.href = this.generalCompanyUrl+"/"+d[i].id;
      var text = document.createTextNode(d[i].name);
      a.appendChild(text);
      var company = document.createElement("SPAN");
      company.className ="col-sm-2";
      company.appendChild(a);
      company.appendChild(document.createElement("BR"));
      //Date
      var dat = new Date(d[i].updated_at);
      var dateD = document.createElement("SPAN");
      dateD.className ="note";
      var dateText = document.createTextNode("Actualizado: "+dat.getDate()+"-"+(dat.getMonth()+1)+"-"+dat.getFullYear());
      dateD.appendChild(dateText);
      company.appendChild(dateD);
      var row = document.createElement("LI");
      row.className ="row";
      row.appendChild(company);
      // email
      var email = document.createElement("SPAN");
      email.className ="col-sm-2";
      var emailText = document.createTextNode(d[i].email);
      email.appendChild(emailText);
      row.appendChild(email);
      //enabled
    /*  var enable = document.createElement("SPAN");
      enable.className ="col-sm-2";
      if(String(d[i].enabled) == '1'){t ="Habilitado";}else{t="Deshabilitado";}
      var enableText = document.createTextNode(t);
      enable.appendChild(enableText);
      row.appendChild(enable);*/
      //contact
  /*    var contact   = document.createElement("SPAN");
      var contactTe = document.createTextNode(d[i].company.contact.name);
      contact.appendChild(contacTe);
      contact.appendChild(document.createElement("BR"));*/
      document.getElementById("List").appendChild(row);
    }
    document.getElementById("boxResults").style.display ="block";
    document.getElementById("companies").style.display ="none";
  },

  _makeRequest : function(url){
    var request = new XMLHttpRequest();
    request.open('POST', url, true);
    request.onerror = function() {
    };
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    return request;
  },

  _search : function(e){
    var _query   = this.searchBox.value;
    if(_query.length > 1){
      var type = this.searchBox.id;
      var url = "";
      if(type === 'search-company'){
        url = this.companyUrl;
      }else if(type==='search-opd'){
        url = this.opdUrl;
      }else if(type==='search-student'){
        url = this.studentUrl;
      }
      var request = new this._makeRequest(url),
      that    = this,
      data    = "match=" + _query + "&_token=" + this._token;

      request.onload = function(){
        if (request.status >= 200 && request.status < 400) {
          var d = JSON.parse(request.responseText);
          that._renderOptions(d);
        } else {
          //console.log("algo falló en la respuesta");
        }
      };

      request.send(data);
    }
  },

};
