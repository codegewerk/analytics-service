async function postDeviceInfo({ endpoint, fetchMode } = {}) {
  endpoint = endpoint || "https://analytics.codegewerk.de/";
  fetchMode = fetchMode || "cors";

  console.log(endpoint, fetchMode);

  let data = { platform: navigator.platform, userAgent: navigator.userAgent };

  return await fetch(endpoint, {
    method: "POST",
    mode: fetchMode,
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify(data)
  });
}

function setEndpoint() {
  return location.protocol + "//" + location.host + "/";
}
