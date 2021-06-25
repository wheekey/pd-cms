import React from 'react';

export default ({
  label,
  name,
  className,
  children,
  errors = [],
  ...props
}) => {
  return (
      <label className="flex flex-col w-2/4">
          <span className="text-gray-700 ">{label}</span>
          <select
              id={name}
              name={name}
              {...props}
              className={` ${errors.length ? 'error' : ''}`}
          >
              {children}
          </select>
          {errors && <div className="form-error">{errors}</div>}
      </label>
  );
};
