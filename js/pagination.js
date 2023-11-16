function addPageToQueryParams(paramValue) {
  var currentURL = window.location.href;

  var urlParts = currentURL.split('?');
  var baseUrl = urlParts[0];
  var queryParams = urlParts[1] ? urlParts[1].split('&') : [];

  var paramExists = false;

  for (var i = 0; i < queryParams.length; i++) {
      var param = queryParams[i].split('=');
      if (param[0] === 'page') {
          param[1] = paramValue;
          queryParams[i] = param.join('=');
          paramExists = true;
          break;
      }
  }

  if (!paramExists) {
      queryParams.push('page' + '=' + paramValue);
  }

  var newURL = baseUrl + '?' + queryParams.join('&');

  window.location.href = newURL;
}
