export const formatDate = value => {
  if (value === null) {
    return "";
  }

  return new Date(value).toLocaleString("en-US");
};
